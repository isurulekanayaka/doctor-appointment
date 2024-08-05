<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserChannelController extends Controller
{
    public function index(){
        return view('user.channel');
    }
}
