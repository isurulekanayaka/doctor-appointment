<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstAidController extends Controller
{
    public function index(){
        return view('user.firstaid');
    }
}
