<?php

namespace App\Http\Controllers\APP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseReturnController extends Controller
{
    //
    public function index(Request $request)
    {
        return view("app.purchaseReturn.view");
    }
}
