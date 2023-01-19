<?php

use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoiceAttachmentsController;
use App\Http\Controllers\InvoicesArchiveController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
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

Route::get('/r', function () {
    return view('auth.register');
});



//Auth::routes(['register' => false]); //Disable linke for register
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('invoices', InvoicesController::class);

Route::resource('sections', SectionsController::class);

Route::resource('products', ProductsController::class);

Route::resource('attachment', InvoiceAttachmentsController::class);

Route::resource('Archive',InvoicesArchiveController::class);

Route::post('delete_file', [App\Http\Controllers\InvoicesDetailsController::class,'destroy'])->name('delete_file');

Route::get('download/{invoice_number}/{file_name}',[App\Http\Controllers\InvoicesDetailsController::class,'get_file']);

Route::get('View_file/{invoice_number}/{file_name}', [App\Http\Controllers\InvoicesDetailsController::class,'open_file']);

Route::get('/section/{id}',[App\Http\Controllers\InvoicesController::class,'getproducts']);

Route::get('/InvoicesDetails/{id}',[App\Http\Controllers\InvoicesDetailsController::class,'show']);

Route::get('/Status_show/{id}',[App\Http\Controllers\InvoicesController::class,'show'])->name('Status_show');

Route::get('/Status_Update/{id}',[App\Http\Controllers\InvoicesController::class,'Status_Update'])->name('Status_Update');

Route::get('/edit_invoice/{id}',[App\Http\Controllers\InvoicesController::class,'edit']);


Route::get('/Invoices/Paid',[App\Http\Controllers\InvoicesController::class,'Invoices_Paid']);

Route::get('/Invoices/UnPaid',[App\Http\Controllers\InvoicesController::class,'Invoices_UnPaid']);

Route::get('/Invoices/Partial',[App\Http\Controllers\InvoicesController::class,'Invoices_Partial']);

Route::get('/Invoices/Archived',[App\Http\Controllers\InvoicesArchiveController::class,'index']);

Route::get('/Print_invoice/{id}',[App\Http\Controllers\InvoicesController::class,'print']);

Route::get('/export_invoices', [App\Http\Controllers\InvoicesController::class, 'export'])->name('export_invoices');



Route::group(['middleware' => ['auth']], function() {

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);

});

Route::get('/{page}',[App\Http\Controllers\AdminController::class, 'index']);


