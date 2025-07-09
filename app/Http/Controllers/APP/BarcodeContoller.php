<?php

namespace App\Http\Controllers\APP;

use App\Http\Controllers\Controller;
use App\Models\BarcodeSetting;
use App\Models\Location;
use App\Models\product;
use File;
use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeGeneratorPNG;

class BarcodeContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = product::get(['product_name', 'id', 'location', 'mark', 'item_code', 'images']);
        $locations = Location::get('name');
        $bar = BarcodeSetting::first();
        // return $products;
        return view('app.barcode.index', compact('products', 'locations', 'bar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        BarcodeSetting::updateOrCreate(
            ['id' => 1], // or use user_id if per-user config
            [
                'label_name' => $request->label_name,
                'fields' => json_encode($request->fields),
                'barcode_width' => $request->bar_width,
                'barcode_hight' => $request->bar_height,
                'label_width' => $request->lable_width,
                'label_hight' => $request->lable_height,
                'font_size' => $request->font_size,
                'font_family' => $request->font_family,
                'lable_count_row' => $request->label_count,
            ]
        );
        return redirect()->route('barcode.index')->with('success', 'Barcode Settings saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
        $directory = storage_path('app/public/barcode_labels');

        if (File::exists($directory)) {
            File::deleteDirectory($directory);
            return back()->with('success', 'All Barcodes Printed Successfuly.');
        }
        return back()->with('error', 'Barcode folder does not exist.');

    }

    // Print Barcodes
    public function printBarcode(Request $request)
    {
        $bar = BarcodeSetting::findOrFail(1);

        $productIds = $request->ids;
        $quantities = $request->qtys;

        // Setup paths and barcode generator
        $outputDir = storage_path('app/public/barcode_labels');
        File::ensureDirectoryExists($outputDir);
        $generator = new BarcodeGeneratorPNG();

        $fields = json_decode($bar->fields, true);
        $fontPath = public_path("fonts/{$bar->font_family}.ttf");
        $dpi = 300;
        $mmToPx = fn($mm) => (int) round(($mm / 25.4) * $dpi);

        // Dimensions
        $labelWidth = $mmToPx($bar->label_width);
        $labelHeight = $mmToPx($bar->label_hight);
        $barcodeHeight = $mmToPx($bar->barcode_hight);
        $labelsPerRow = (int) $bar->lable_count_row;
        $gap = ($mmToPx($bar->label_width * $labelsPerRow + ($labelsPerRow + 1) * 2.5) - ($labelWidth * $labelsPerRow)) / ($labelsPerRow + 1);
        $rowWidth = $mmToPx($bar->label_width * $labelsPerRow + ($labelsPerRow + 1) * 2.5);
        $rowHeight = $labelHeight;

        $imageIndex = 1;
        $images = [];

        // Loop through each product and its quantity
        foreach ($productIds as $idx => $productId) {
            $product = Product::findOrFail($productId);
            $labelQty = (int) $quantities[$idx];
            $itemCode = $product->item_code;

            for ($row = 0; $row < ceil($labelQty / $labelsPerRow); $row++) {
                $img = imagecreatetruecolor($rowWidth, $rowHeight);
                $white = imagecolorallocate($img, 255, 255, 255);
                $black = imagecolorallocate($img, 0, 0, 0);
                imagefill($img, 0, 0, $white);

                for ($j = 0; $j < $labelsPerRow; $j++) {
                    $labelIndex = $row * $labelsPerRow + $j;
                    if ($labelIndex >= $labelQty) {
                        break;
                    }

                    $offsetX = $gap + $j * ($labelWidth + $gap);
                    $lineHeight = $bar->font_size + 6;
                    $totalHeight = $lineHeight * (count($fields) - 1) + $barcodeHeight;
                    $offsetY = ($labelHeight - $totalHeight) / 2;

                    // Generate barcode
                    $barcodeData = $generator->getBarcode($itemCode, $generator::TYPE_CODE_128);
                    $barcodeImg = imagecreatefromstring($barcodeData);
                    $barcodeTargetWidth = $labelWidth - $mmToPx(3);
                    $barcodeX = $offsetX + ($labelWidth - $barcodeTargetWidth) / 2;

                    imagecopyresampled($img, $barcodeImg, $barcodeX, $offsetY, 0, 0, $barcodeTargetWidth, $barcodeHeight, imagesx($barcodeImg), imagesy($barcodeImg));
                    $textY = $offsetY + $barcodeHeight + $mmToPx(2);

                    // Render text fields
                    foreach ($fields as $field) {
                        $text = match ($field) {
                            'shop_name'     => $bar->shop_name ?? 'Shop',
                            'item_code'     => $itemCode,
                            'product_name'  => $product->product_name ?? 'Product',
                            'selling_price' => 'Rs. ' . number_format($product->selling_price) . '.00',
                            'online_price'  => 'Rs. ' . number_format($product->online_price) . '.00',
                            'description'   => $product->mark ?? '',
                            default         => '',
                        };

                        if ($text) {
                            $textBox = imagettfbbox($bar->font_size, 0, $fontPath, $text);
                            $textX = $offsetX + ($labelWidth - ($textBox[2] - $textBox[0])) / 2;
                            imagettftext($img, $bar->font_size, 0, $textX, $textY, $black, $fontPath, $text);
                            $textY += $bar->font_size + 6;
                        }
                    }
                }

                // Save image file
                $filename = "{$outputDir}/{$bar->label_name}_product_{$productId}_row_" . ($row + 1) . ".png";
                imagepng($img, $filename);
                imagedestroy($img);

                $images[] = asset('storage/barcode_labels/' . basename($filename));
                $imageIndex++;
            }
        }

        return view('app.barcode.print', compact('images'));
    }

}
