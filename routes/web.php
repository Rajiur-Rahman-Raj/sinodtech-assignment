<?php

use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\LostCustomerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {

    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/branches', [BranchController::class, 'index'])->name('branch.index');
    Route::get('/branch/details/{branch}', [BranchController::class, 'details'])->name('branch.details');

    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/details/{product}', [ProductController::class, 'details'])->name('product.details');

    Route::get('/customers', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customers/{customer}', [CustomerController::class, 'details'])
        ->name('customer.details');

    Route::get('/lost-customers', [LostCustomerController::class, 'index'])
        ->name('lost.customer.index');

    Route::get('/customers/{customer}/assign', [LostCustomerController::class, 'customerAssignToEmployee'])
        ->name('customer.assign');

    Route::post('/customers/{customer}/assign', [LostCustomerController::class, 'customerAssignToEmployeeStore'])
        ->name('customer.assign.store');

    Route::post('/lost-customers/send-mail', [LostCustomerController::class, 'sendPromotionMail'])
        ->name('send.mail.to.lost.customers');

    Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('/employees/details/{employee}', [EmployeeController::class, 'details'])->name('employee.details');


    Route::get('/sales', [SaleController::class, 'index'])->name('sale.index');
    Route::get('/sale/create', [SaleController::class, 'create'])->name('sale.create');
    Route::post('/sale/store', [SaleController::class, 'store'])->name('sale.store');
    Route::get('/sale/details/{sale}', [SaleController::class, 'details'])->name('sale.details');

    Route::get('/branch-products/{branch}', [SaleController::class, 'branchProducts'])->name('sale.branch.products');
});

require __DIR__ . '/auth.php';
