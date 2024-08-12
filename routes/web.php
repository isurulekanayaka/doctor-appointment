<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FirstAidController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserChannelController;
use App\Http\Controllers\UserHomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.user');
});

Route::get('/home',[UserHomeController::class,'index'])->name('userhome.index');

Route::get('/chanenl',[UserChannelController::class,'index'])->name('userchannel.index');

Route::get('/first-aid',[FirstAidController::class,'index'])->name('userfirstaid.index');

Route::get('/contact',[ContactController::class,'index'])->name('usercontact.index');

Route::get('/fqa', function () {
    return view('user.fqa');
})->name('userfqa');

Route::get('/login',[AuthController::class,'loginView'])->name('user.login');

Route::get('/register',[AuthController::class,'registerView'])->name('user.register');

Route::get('/user-profile',[AuthController::class,'userProfile'])->name('user.profile');

Route::get('/about', function () {
    return view('user.about');
})->name('userabout');

Route::get('/appoinntment',[AppointmentController::class,'index'])->name('user.index');

Route::get('/payment',[PaymentController::class,'index'])->name('user.payment');


// Admin Routes
Route::get('/admin-dashboard',[AdminController::class,'index'])->name('admin.dashboard');

Route::get('/admin-hospital',[AdminController::class,'hospital'])->name('admin.hospital');

Route::get('/admin-doctor',[AdminController::class,'doctor'])->name('admin.doctor');

Route::get('/admin-user',[AdminController::class,'user'])->name('admin.user');