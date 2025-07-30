<?php

use App\Http\Controllers\CustomerController;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard/dashboard', [
        'title' => 'KKJSO - Dashboard',
        'titleHeader' => 'Dashboard Page',
    ]);
});

Route::get('/order', function () {
    return view('order/order', [
        'title' => 'KKJSO - Order',
        'titleHeader' => 'Order Page',
    ]);
});

Route::get('/item', function () {
    return view('item/item_index', [
        'title' => 'KKJSO - Item',
        'titleHeader' => 'Item Page',
    ]);
})->name('item');

// Route::get('/customer', function () {
//     return view('customer/customer', [
//         'title' => 'KKJSO - Customer',
//         'titleHeader' => 'Customer Page',
//     ]);
// });
Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');;
Route::post('/customer/create', [CustomerController::class, 'store'])->name('customer.create');
Route::get('/customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
Route::put('/customer/{cst}', [CustomerController::class, 'update'])->name('customer.update');
Route::get('/customer/{id}/delete', [CustomerController::class, 'delete'])->name('customer.delete');
Route::delete('/customer/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
Route::get('/get-cities/{stateId}', [CustomerController::class, 'getCities']);
Route::get('/customer/xlsx', [CustomerController::class, 'xlsx'])->name('customer.xlsx');
Route::post('/customer/import', [CustomerController::class, 'import'])->name('customer.import');

Route::get('/sales', function () {
    return view('sales/sales', [
        'title' => 'KKJSO - Sales',
        'titleHeader' => 'Sales Page',
    ]);
})->name('sales');

Route::get('/user', function () {
    return view('user/user', [
        'title' => 'KKJSO - User',
        'titleHeader' => 'User Page',
    ]);
})->name('user');
