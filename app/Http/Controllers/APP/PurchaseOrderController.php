<?php

namespace App\Http\Controllers\APP;

use App\Http\Controllers\Controller;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    //
    public function index()
    {
        // $orders = PurchaseOrder::all();
        return view("app.purchaseOrder.view");
    }
}
