<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class HospitalController extends Controller
{
    public function index(Request $request)
    {
        return view('hospital.dashboard');
    }

    public function appointment(Request $request)
    {
        return view('hospital.appointment');
    }
    public function doctor(Request $request)
    {
        return view('hospital.doctor');
    }
    public function channeling(Request $request)
    {
        return view('hospital.channeling');
    }
    public function payment(Request $request)
    {
        return view('hospital.payment-summery');
    }
}
