<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FirstAidController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserChannelController;
use App\Http\Controllers\UserController;
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

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

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

Route::middleware('auth')->group(function () {
    Route::get('/appointment/{id}', [AppointmentController::class, 'index'])->name('user.index');

    Route::get('/payment', [PaymentController::class, 'index'])->name('user.payment');
});


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

    // Route::get('/add-doctor',[DoctorController::class,'addDoctor'])->name('admin.addDoctor');
    // Route::post('/add-doctor',[DoctorController::class,'storeDoctor'])->name('addDoctor');
    // Route::post('/update-doctor',[DoctorController::class,'updateDoctor'])->name('updatedoctor');
    // Route::get('/update-doctor',[DoctorController::class,'updateDoctor'])->name('updatedoctor');
    // Route::post('/delete-doctor',[DoctorController::class,'deleteDoctor'])->name('deletedoctor');

    Route::get('/add-user',[UserController::class,'addUser'])->name('admin.addUser');
    Route::post('/add-user',[UserController::class,'storeUser'])->name('addUser');
    Route::post('/update-user',[UserController::class,'updateUser'])->name('updateuser');
    Route::get('/update-user',[UserController::class,'updateUser'])->name('updateuser');
    Route::post('/delete-user',[UserController::class,'deleteUser'])->name('deleteuser');
});

// Hospital Routes
Route::middleware(['auth', 'userType:hospital'])->group(function () {
    Route::get('/hospital-dashboard', [HospitalController::class, 'index'])->name('hospital.dashboard');
    Route::get('/hospital-appointment', [HospitalController::class, 'appointment'])->name('hospital.appointment');
    Route::get('/hospital-doctor', [HospitalController::class, 'doctor'])->name('hospital.doctor');
    Route::get('/hospital-channeling', [HospitalController::class, 'channeling'])->name('hospital.channeling');
    Route::get('/hospital-payment', [HospitalController::class, 'payment'])->name('hospital.payment');

    Route::get('/add/new-doctor',[DoctorController::class,'addnewDoctor'])->name('hospital.addDoctor');
    Route::post('/add-doctor',[DoctorController::class,'storeDoctor'])->name('addDoctor');
    Route::get('/doctor/add-hospital',[DoctorController::class,'doctorAddHospital'])->name('hospital.doctorAddHospital');
    Route::get('/doctor/add-hospital/{doctor_id}', [DoctorController::class, 'addHospital'])->name('hospital.newdoctorAddHospital');
    Route::post('/search/hospital-doctors', [DoctorController::class,'searchRegisterDoctor'])->name('hospital.searchdoctor');
    Route::post('/search/hospital-new-doctors', [DoctorController::class,'searchNonRegisterDoctor'])->name('hospital.searchnewdoctor');
});
