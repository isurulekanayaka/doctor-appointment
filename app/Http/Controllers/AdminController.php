<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.dashboard');
    }
    public function hospital(Request $request)
    {
        return view('admin.hospital');
    }
    public function doctor(Request $request)
    {
        return view('admin.doctor');
    }
    public function user(Request $request)
    {
        return view('admin.user');
    }
}
