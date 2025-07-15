<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\product;
use Illuminate\Http\Request;

class POSController extends Controller
{
    //

    public function index()
    {
        $orderId = 'order_#' . now()->timestamp;

        return view('pos.index', compact('orderId'));
    }


    public function scan(Request $request)
    {
        // Validate the request to ensure 'barcode' is present
        $request->validate([
            'barcode' => 'required|string',
        ]);
        $orderID  = $request->input('orderID');
        $ItemCode = $request->input('barcode');
        $product = product::where('item_code', $ItemCode)->first();
        if($product) {
            return $this->addTocart($product,$orderID);
        } else {
            // If product not found, return an error message
            return response()->json(['message' => 'Invalid product name.'], 400);
        }
        // Perform actions based on the scanned barcode

    }

    public function addTocart($product , $orderID)
    {
        // Logic to add item to cart
        $cartItem = Cart::where('order_id', $orderID)
                    ->where('product_id', $product->id)
                    ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            $discount = 0;
            $net = $product->selling_price;
            if($product->discount_percentage){
                $discount = $product->discount_percentage;
                $net = $product->selling_price * ($product->discount_percentage / 100);
            }
            Cart::create([
                'order_id'   => $orderID,
                'product_id' => $product->id,
                'quantity'   => 1,
                'discount'   => $discount,
                'net_price'  => $net,
                'created_at' => now(),
                'updated_at' => now()

            ]);
        }

        return response()->json(['message' => 'Product added to cart successfully.']);
    }
}
