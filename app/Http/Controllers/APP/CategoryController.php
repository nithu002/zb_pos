<?php

namespace App\Http\Controllers\APP;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Picqer\Barcode\BarcodeGeneratorHTML;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::latest()->get();
        return view("app.category.list", compact("categories"));

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
                'category' => 'required|string|max:255',
            ]);

            $cat = new Category();
            $cat->category = $request->category;
            $cat->status = $request->status ?? 1;
            $cat->save();

            return response()->json([
                'status'=> 'success',
                'id' => $cat->id,
                'category' => $cat->category,
                'slug' => $cat->slug,
            ]);


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
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->status = $request->status ?? 1;
        $category->save();
        return response()->json([
            'status'=> 'success',
            'id'=> $category->id,
            'category'=> $category->category,
            'slug'=> $category->slug,
            ]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function subData(Request $request){

        $categoryId = $request->category_id;
        $subcategories = SubCategory::where('cat_id', $categoryId)->get(columns: ['name']);

        return response()->json($subcategories);
    }

    // Fiterby Status
    public function filterByStatus(Request $request){

        $status = $request->status;

        $categories = [];
        if ($status !== null) {
            $categories = Category::where('status', $status )->latest()
                    ->get();
        }

        // Return only the table rows as HTML
        $html = view('app.category.table', compact('categories'))->render();
        return response()->json(['html' => $html]);
    }
}
