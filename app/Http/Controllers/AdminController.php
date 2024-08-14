<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $hospital = User::where('type', 'doctor')->count();
        return view('admin.dashboard',compact('hospital'));
    }
    public function hospital(Request $request)
    {
        $hospital = User::where('type', 'doctor')->get();
        // dd($hospital);
        return view('admin.hospital', compact('hospital'));
    }
    public function doctor(Request $request)
    {
        return view('admin.doctor');
    }
    public function user(Request $request)
    {
        return view('admin.user');
    }
    public function addHospital(Request $request)
    {
        return view('admin.add-hospital');
    }
}
