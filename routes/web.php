<?php

use App\Http\Controllers\InvoiceDetailsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
//Route::get('/{page}','App\Http\Controllers\AdminController@index');

//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['register'=>true]);
Route::get('/invoices', [App\Http\Controllers\InvoiceController::class, 'index'])->name('invoices.index');
Route::get('/invoices/view_invoice/{id}', [App\Http\Controllers\InvoiceController::class, 'show'])->name('view_invoice');
Route::get('/invoices/add', [App\Http\Controllers\InvoiceController::class, 'add'])->name('invoices.add');
Route::post('/invoices/store', [App\Http\Controllers\InvoiceController::class, 'store'])->name('invoices.store');
Route::post('/invoices/store_p', [App\Http\Controllers\InvoiceController::class, 'store_p'])->name('invoices.store_p');
Route::get('/invoices/print_invoice/{id}', [App\Http\Controllers\InvoiceController::class, 'print_invoice'])->name('print_invoice');


Route::get('/section/{id}', [App\Http\Controllers\InvoiceController::class, 'getproducts']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sections', [App\Http\Controllers\SectionController::class, 'index'])->name('sections.index');
Route::post('/sections', [App\Http\Controllers\SectionController::class, 'store'])->name('sections.store');
Route::post('/sections/edit', [App\Http\Controllers\SectionController::class, 'edit'])->name('sections.edit');
Route::get('/sections/{id}', [App\Http\Controllers\SectionController::class, 'destroy'])->name('sections.delete');

Route::get('/invoiceDetails/{id}', [App\Http\Controllers\InvoiceDetailsController::class, 'edit'])->name('invoiceDetails.edit');



//Products
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::post('/products', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.delete');
Route::post('/products/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');






//Route::resource('sections', '\App\Http\Controllers\SectionController');
Route::get('/{page}','App\Http\Controllers\AdminController@index');


Route::get('view_file/{invoice_no}/{file_name}',[InvoiceDetailsController::class,'open_file']);
Route::get('download/{invoice_no}/{file_name}',[InvoiceDetailsController::class,'save_file']);
Route::post('/delete_file/',[InvoiceDetailsController::class,'delete_file'])->name('delete_file');

