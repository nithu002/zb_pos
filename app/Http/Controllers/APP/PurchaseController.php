<?php

namespace App\Http\Controllers\APP;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    //
    public function index()
    {
        // $purchase = Purchase::all();

        return view('app.purchase.view');

    }

}
