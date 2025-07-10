<?php

use App\Http\Controllers\APP\BarcodeContoller;
use App\Http\Controllers\App\CategoryController;
use App\Http\Controllers\APP\SubCategoriesController;
use App\Http\Controllers\App\VariantController;
use App\Http\Controllers\APP\ProductsController;

use App\Http\Controllers\APP\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app.dashboard');
});


// App Routes
//Products
Route::resource('product', ProductsController::class);
Route::get('/products/next-item-code', [ProductsController::class, 'nextItemCode'])->name('products.nextItemCode');
Route::post('/products/filter-by-category', [ProductsController::class, 'filterByCategory'])->name('products.filterByCategory');
Route::post('/products/destroy', [ProductsController::class, 'destroy'])->name('products.destroy');
Route::post('products/update/{id}', [ProductsController::class, 'update'])->name('products.update');
// Export to excel
Route::post('/products/export-selected', [ProductsController::class, 'exportSelected'])->name('products.exportSelected');
// Export to pdf
Route::post('/products/export-selected-pdf', [ProductsController::class, 'exportSelectedPdf'])->name('products.exportSelectedPdf');
//AI Image
Route::post('/products/generate-ai-image', [ProductsController::class, 'generateAiImage'])->name('products.generateAiImage');

// Expired Product List
Route::get('expired-products', [ProductsController::class, 'expiredProducts'])->name('expired.products');
Route::post('expired/filter-by-category', [ProductsController::class, 'expiredFilterByCategory'])->name('products.filterByCategory.expired');
Route::post('restore-product', [ProductsController::class, 'restoreProduct'])->name('restore.product');
// Low Stock Product List
Route::get('low-stocks', [ProductsController::class, 'lowStockProducts'])->name('low-stock.product');
Route::post('low-stock/product/edit', [ProductsController::class, 'lowStockProductsEdit'])->name('low-stock.product.edit');
// Product list send into Email
Route::post('products-sendviaEmail', [ProductsController::class, 'stockSendMail'])->name('products.sendviaEmail');

//

//Categories
Route::resource('categories', CategoryController::class);
Route::post('get/sub-data', [CategoryController::class, 'subData'])->name('get.sub.data');
Route::post('category/filterByStatus', [CategoryController::class, 'filterByStatus'])->name('category.filterByStatus');
Route::post('category/update', [CategoryController::class, 'update'])->name('category.update');


// Route::get('customer-view', function () {
//     return view('customer.view');
// });

// Customer view

Route::get('customer-view', [CustomerController::class, 'index'])->name('customer.view');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers', [CustomerController::class, 'show'])->name('customers.show');

// Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');



//Categories
Route::resource('categories', CategoryController::class);
Route::post('get/sub-data', [CategoryController::class, 'subData'])->name('get.sub.data');
Route::post('category/filterByStatus', [CategoryController::class, 'filterByStatus'])->name('category.filterByStatus');
Route::post('category/update', [CategoryController::class, 'update'])->name('category.update');
Route::post('category/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');

//Sub Categories
Route::resource('sub-categories', SubCategoriesController::class)->only(['index', 'store', 'update', 'destroy']);


// Billers view 
Route::get('supplier-view', function () {
    return view('supplier.view');
});

// Location view
Route::get('location-view', function () {
    return view('location.view');
});




//Variant Routes
Route::resource('variants', VariantController::class);

//Barcode
Route::resource('barcode', BarcodeContoller::class);
Route::post('barcodes-print', [BarcodeContoller::class, 'printBarcode'])->name('barcodes.print');
Route::post('barcode-delete', [BarcodeContoller::class, 'destroy'])->name('barcode.delete');

