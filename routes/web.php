<?php

use App\Models\Customer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('/employee/create', [EmployeeController::class, 'store'])->name('employee.create');

Route::get('/user',[UserController::class, 'index'])->name('user');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');;
Route::post('/user/create', [UserController::class, 'store'])->name('user.create');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{usr}/', [UserController::class, 'update'])->name('user.update');
Route::get('/user/{id}/delete', [UserController::class, 'delete'])->name('user.delete');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
