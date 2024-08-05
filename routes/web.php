<?php

use App\Http\Controllers\FirstAidController;
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
    return view('user.channel');
});

Route::get('/home',[UserHomeController::class,'index'])->name('userhome.index');

Route::get('/chanenl',[UserChannelController::class,'index'])->name('userchannel.index');

Route::get('first-aid',[FirstAidController::class,'index'])->name('userfirstaid.index');