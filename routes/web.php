<?php

use App\Http\Controllers\APP\BarcodeContoller;
use App\Http\Controllers\App\CategoryController;
use App\Http\Controllers\APP\LocationController;
use App\Http\Controllers\APP\PurchaseController;
use App\Http\Controllers\APP\PurchaseOrderController;
use App\Http\Controllers\APP\PurchaseReturnController;
use App\Http\Controllers\APP\SubCategoriesController;
use App\Http\Controllers\App\SupplierController;
use App\Http\Controllers\APP\UnitController;
use App\Http\Controllers\App\VariantController;
use App\Http\Controllers\APP\ProductsController;

use App\Http\Controllers\APP\CustomerController;
use App\Http\Controllers\APP\BrandController;
use App\Http\Controllers\APP\WarrantyController;
use App\Http\Controllers\POS\POSController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app.dashboard');
})->name('dashboard');


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


// Customer view
Route::get('customers', [CustomerController::class, 'index'])->name('customer');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');

// Customer Download pdf
Route::post('/customers/download-pdf', [CustomerController::class, 'downloadPdf'])->name('customers.downloadPdf');
Route::post('/customers/download-excel', [CustomerController::class, 'downloadExcel'])->name('customers.downloadExcel');


// Supplier Section

Route::post('/suppliers/download-pdf', [SupplierController::class, 'downloadPdf'])->name('suppliers.downloadPdf');
Route::post('/suppliers/download-excel', [SupplierController::class, 'downloadExcel'])->name('suppliers.downloadExcel');

Route::get('suppliers', [SupplierController::class, 'index'])->name('suppliers');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
Route::get('/suppliers/{id}', [SupplierController::class, 'show'])->name('suppliers.show');
Route::put('/suppliers/{id}', [SupplierController::class, 'update'])->name('suppliers.update');
Route::delete('/suppliers/{id}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');

// Location Section
Route::post('/location/download-pdf', [LocationController::class, 'downloadPdf'])->name('location.downloadPdf');
Route::post('/location/download-excel', [LocationController::class, 'downloadExcel'])->name('location.downloadExcel');
Route::get('location', [LocationController::class, 'index'])->name('location');

Route::post('/location', [LocationController::class, 'store'])->name('location.store');
Route::get('/location/{id}', [LocationController::class, 'show'])->name('location.show');
Route::put('/location/{id}', [LocationController::class, 'update'])->name('location.update');
Route::delete('/location/{id}', [LocationController::class, 'destroy'])->name('location.destroy');




//Categories
Route::resource('categories', CategoryController::class);
Route::post('get/sub-data', [CategoryController::class, 'subData'])->name('get.sub.data');
Route::post('category/filterByStatus', [CategoryController::class, 'filterByStatus'])->name('category.filterByStatus');
Route::post('category/update', [CategoryController::class, 'update'])->name('category.update');
Route::post('category/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');

//Sub Categories
Route::resource('sub-categories', SubCategoriesController::class)->only(['index', 'store', 'destroy']);
Route::post('sub-categories/update', [SubCategoriesController::class, 'update'])->name('sub-categories.update');
Route::post('sub-categories/filterByCategory', [SubCategoriesController::class, 'filterByCategory'])->name('subCategory.filterByCategory');
Route::post('sub-categories/filterByStatus', [SubCategoriesController::class, 'filterByStatus'])->name('subCategory.filterByStatus');
Route::post('sub-categories/destroy', [SubCategoriesController::class, 'destroy'])->name('subCategories.destroy');


//Brand Routes
Route::resource('brands',BrandController::class);

//Units Routes
Route::resource('units',UnitController::class);
Route::post('unit/update', [UnitController::class, 'update'])->name('unit.update');
Route::post('unit/filterByStatus', [UnitController::class, 'filterByStatus'])->name('unit.filterByStatus');
Route::post('unit/destroy', [UnitController::class, 'destroy'])->name('unit.destroy');

// Purchase Routes

Route::get('purchase', [PurchaseController::class,'index'])->name(  'purchase');
Route::post('/purchases', [PurchaseController::class, 'store'])->name('purchases.store');
Route::get('/products/search', [PurchaseController::class, 'searchProducts'])->name('products.search');
// Route::get('/suppliers/add', [SupplierController::class, 'create'])->name('supplier.view');
Route::get('/purchase/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');



// PurchaseOrder Routes

Route::get('purchase_order', [PurchaseOrderController::class,'index'])->name(  'purchase.order');

// PurchaseRetun Route

Route::get('purchase_return', [PurchaseReturnController::class,'index'])->name(  'purchase.return');


//Variant Routes
Route::resource('variants', VariantController::class);
Route::post('variant/update', [VariantController::class, 'update'])->name('variant.update');

// Warranty Routes
Route::resource('warranty', WarrantyController::class);
Route::post('warrantys/update', [WarrantyController::class, 'update'])->name('warrantys.update');
Route::post('warrantys/destroy', [WarrantyController::class,'destroy'])->name('warrantys.destroy');


//Barcode
Route::resource('barcode', BarcodeContoller::class);
Route::post('barcodes-print', [BarcodeContoller::class, 'printBarcode'])->name('barcodes.print');
Route::post('barcode-delete', [BarcodeContoller::class, 'destroy'])->name('barcode.delete');


// POS Routes

Route::get('pos', [POSController::class, 'index'])->name('pos');
Route::post('pos/scan', [POSController::class, 'scan'])->name('pos.scan');
