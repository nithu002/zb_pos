<?php

namespace App\Http\Controllers\APP;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Supplier;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class PurchaseController extends Controller
{
    //

    public function index()
    {
        // $purchase = Purchase::all();
        $purchases = Purchase::with('supplier' , 'items')->latest()->get();
        // $purchases_items = PurchaseItem::with('purchase_id')->latest()->get();
        $suppliers = Supplier::all();

        // Sum qty for each purchase
        $purchaseQtySum = [];
        foreach ($purchases as $purchase) {
            $purchaseQtySum[$purchase->id] = $purchase->items->sum('qty');
        }

        return view('app.purchase.view', compact('suppliers', 'purchases', 'purchaseQtySum' ));


    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'reference' => 'nullable|string',
            'purchase_date' => 'required|date',
            'discount' => 'nullable|numeric',
            'shipping' => 'nullable|numeric',
            'status' => 'required|in:Pending,Received',
            'notes' => 'nullable|string',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.qty' => 'required|integer|min:1',
            'items.*.purchase_price' => 'required|numeric|min:0',
            'items.*.discount' => 'nullable|numeric|min:0',
            'items.*.unit_cost' => 'nullable|numeric',
            'items.*.total' => 'nullable|numeric',

        ]);

        $total = 0;
        foreach ($validated['items'] as $item) {
            $unit_cost = $item['purchase_price'] - $item['discount'];
            $line_total = $unit_cost * $item['qty'];
            $total += $line_total;
        }

        $total += $validated['shipping'] ?? 0;
        $total -= $validated['discount'] ?? 0;

        $purchase = Purchase::create([
            'supplier_id' => $validated['supplier_id'],
            'reference' => $validated['reference'],
            'purchase_date' => $validated['purchase_date'],
            'discount' => 0, // you're not sending main-level discount anymore
            'shipping' => $validated['shipping'],
            'status' => $validated['status'],
            'notes' => $validated['notes'],
            'total' => $total,
        ]);

        foreach ($validated['items'] as $item) {
            $unit_cost = $item['purchase_price'] - $item['discount'];
            $line_total = $unit_cost * $item['qty'];

            $purchase->items()->create([
                'product_id' => $item['product_id'],
                'qty' => $item['qty'],
                'purchase_price' => $item['purchase_price'],
                'discount' => $item['discount'],
                'unit_cost' => $unit_cost,
                'total' => $line_total,
            ]);

        }
        // return dd($purchase);
        return redirect()->back()->with('success', 'Purchase added successfully.');
    }

    public function searchProducts(Request $request)
    {
        $query = $request->get('q');

        $products = Product::where('product_name', 'LIKE', "%{$query}%")
            ->select('id', 'product_name') // Optional: limit fields
            ->get();

        return response()->json($products);
    }

    // public function getItems($id)
    // {
    //     $items = PurchaseItem::with('purchase_items')->where('purchase_id', $id)->get();

    //     return response()->json($items);
    // }

    public function getItems($id)
    {
        $items = PurchaseItem::with('product')->where('purchase_id', $id)
            ->get();

        return response()->json($items);
    }




    public function update(Request $request, $id)
    {

        // dd($request->all());


        // Update purchase table if needed
        $purchase = Purchase::findOrFail($id);
        $purchase->supplier_id = $request->supplier_id;
        $purchase->purchase_date = $request->purchase_date;
        $purchase->reference = $request->reference;
        $purchase->status = $request->status;
        $purchase->notes = $request->notes;
        $purchase->shipping = $request->shipping;
        $purchase->save();

        // ✅ Remove old items if needed
        PurchaseItem::where('purchase_id', $purchase->id)->delete();

        // ✅ Save new items
        // foreach ($request->items as $item) {
        //     $existingItem = PurchaseItem::find($item['item_id'] ?? null);

        //     if ($existingItem) {
        //         $existingItem->update([
        //             'qty' => $item['qty'],
        //             'purchase_price' => $item['purchase_price'],
        //             'discount' => $item['discount'],
        //             'unit_cost' => $item['unit_cost'],
        //             'total' => $item['total'],
        //         ]);
        //     } else {
        //         PurchaseItem::create([
        //             'purchase_id' => $purchase->id,
        //             // 'product_id' => $item['product_id'],
        //             'qty' => $item['qty'],
        //             'purchase_price' => $item['purchase_price'],
        //             'discount' => $item['discount'],
        //             'unit_cost' => $item['unit_cost'],
        //             'total' => $item['total'],
        //         ]);
        //     }
        // }

        return redirect()->route('purchase')->with('success', 'Purchase updated successfully.');
    }


}
