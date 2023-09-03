<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\User\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\ZendeskController;

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

Route::get('/', [DashboardController::class, 'index'])->name('home')->middleware(['auth']);

Route::get('/register',  [HomeController::class, 'register'])->name('register');
Route::get('/register-success',  [HomeController::class, 'register_success'])->name('register.success');
Route::get('/password-reset-form',  [HomeController::class, 'password_reset_form'])->name('password.reset-form');
Route::get('/reset-password/{token}',  [HomeController::class, 'password_reset'])->name('password.reset');
Route::get('/user-login',  [UserController::class, 'login_form'])->name('user.login-form');
Route::get('/login',  [UserController::class, 'login_form'])->name('login');
Route::post('/user-login',  [UserController::class, 'login'])->name('user.login');
Route::get('/user-logout',  [UserController::class, 'logout'])->name('user.logout');



Route::get('/create', [CreateController::class, 'index'])->name('create')->middleware(['auth']);


Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/contact', [DashboardController::class, 'contact'])->name('contact');
    // Route::get('/application/diaspora/{id}', [DashboardController::class, 'diaspora'])->name('diaspora')->where('id', '[0-9]+');
    // Route::get('/application/diaspora_after_create/{id}', [DashboardController::class, 'diaspora_after_create'])->name('diaspora_after_create')->where('id', '[0-9]+');
    // Route::get('/application', [DashboardController::class, 'application'])->name('new-application');
    // Route::get('/application/edit/{id}', [DashboardController::class, 'edit_application'])->name('edit-application');
    // Route::get('/application/payment/{id}', [DashboardController::class, 'payment'])->name('payment')->where('id', '[0-9]+');
    // Route::get('/application/payment/{id}/stripe', [DashboardController::class, 'payment_stripe'])->name('payment.stripe')->where('id', '[0-9]+');
    // Route::get('/application/payment/{id}/flutterwave', [DashboardController::class, 'payment_flutterwave'])->name('payment.flutterwave')->where('id', '[0-9]+');
    // Route::get('/application/payment/cancel_flutterwave', [DashboardController::class, 'cancel_flutterwave'])->name('payment.cancel-flutterwave');
    // Route::post('/application/payment/{id}/stripe/purchase', [DashboardController::class, 'purchase_stripe'])->name('purchase.stripe')->where('id', '[0-9]+');
    // Route::get('/application/payment/{id}/flutterwave/purchase', [DashboardController::class, 'purchase_flutterwave'])->name('purchase.flutterwave')->where('id', '[0-9]+');
    // Route::get('/application/receipt/{id}', [DashboardController::class, 'receipt_download'])->name('receipt')->where('id', '[0-9]+');
    // Route::get('/application/{id}/{status}', [DashboardController::class, 'status_change'])->name('status_change')->where('id', '[0-9]+')->where('status', '[a-z]+');
});


// Route::middleware(['auth:sanctum', 'verified', 'admin.role'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
