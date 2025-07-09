<?php

namespace App\Http\Controllers\APP;

use App\Models\Variant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            $request->validate([
                'variant' => 'required|string|max:255',
                'variantValue' => 'required|array',
                'variantValue.*' => 'string|max:255',
            ]);

            $variant = new Variant();
            $variant->name = $request->input('variant');
            $variant->values = json_encode($request->input('variantValue')); // or just $request->input('variantValue') if $casts is set
            $variant->status = 1;
            $variant->save();

            return response()->json([
                'variant' => $variant->name,
            ]);
    }

    /**w
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
    public function destroy(string $id)
    {
        //
    }
}
