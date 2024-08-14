<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FirstAidController;
use App\Http\Controllers\HospitalController;
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
    return view('user.home');
});

Route::get('/home',[UserHomeController::class,'index'])->name('userhome.index');

Route::get('/chanenl',[UserChannelController::class,'index'])->name('userchannel.index');

Route::get('/first-aid',[FirstAidController::class,'index'])->name('userfirstaid.index');

Route::get('/contact',[ContactController::class,'index'])->name('usercontact.index');

Route::get('/fqa', function () {
    return view('user.fqa');
})->name('userfqa');

Route::get('/login',[AuthController::class,'loginView'])->name('user.login');
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::get('/register',[AuthController::class,'registerView'])->name('user.register');
Route::post('/register',[AuthController::class,'register'])->name('register');

Route::get('/user-profile',[AuthController::class,'userProfile'])->name('user.profile');

Route::get('/about', function () {
    return view('user.about');
})->name('userabout');

Route::get('/appoinntment',[AppointmentController::class,'index'])->name('user.index');

Route::get('/payment',[PaymentController::class,'index'])->name('user.payment');


// Admin Routes
Route::middleware(['auth', 'userType:admin'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin-hospital', [AdminController::class, 'hospital'])->name('admin.hospital');
    Route::get('/admin-doctor', [AdminController::class, 'doctor'])->name('admin.doctor');
    Route::get('/admin-user', [AdminController::class, 'user'])->name('admin.user');
    Route::get('/add-hospital',[AdminController::class,'addHospital'])->name('admin.addhospital');
    Route::post('/add-hospital',[HospitalController::class,'storeHospital'])->name('addhospital');
    Route::post('/update-hospital',[HospitalController::class,'updateHospital'])->name('updatehospital');
    Route::get('/update-hospital',[HospitalController::class,'updateHospital'])->name('updatehospital');
    Route::post('/delete-hospital',[HospitalController::class,'deleteHospital'])->name('deletehospital');
});

// Hospital Routes
Route::middleware(['auth', 'userType:doctor'])->group(function () {
    Route::get('/hospital-dashboard', [HospitalController::class, 'index'])->name('hospital.dashboard');
    Route::get('/hospital-appointment', [HospitalController::class, 'appointment'])->name('hospital.appointment');
    Route::get('/hospital-doctor', [HospitalController::class, 'doctor'])->name('hospital.doctor');
    Route::get('/hospital-channeling', [HospitalController::class, 'channeling'])->name('hospital.channeling');
    Route::get('/hospital-payment', [HospitalController::class, 'payment'])->name('hospital.payment');
});