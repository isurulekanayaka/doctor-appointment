<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorHospital;
use Illuminate\Foundation\Console\DocsCommand;
use Illuminate\Http\Request;

class UserChannelController extends Controller
{
    public function index()
    {
        // Get all doctors with hospital information
        $doctorHospitals = DoctorHospital::with(['doctor', 'hospital'])->get();
    
        // Return the data to the view
        return view('user.channel', compact('doctorHospitals'));
    }
    
    
    
}
