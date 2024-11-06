<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Fetch counts for different types of users and doctors
            $hospitalCount = User::where('type', 'hospital')->count(); // Count of users with type 'doctor'
            $doctorCount = Doctor::count(); // Total number of doctors
            $userCount = User::where('type', '!=', 'doctor')->count(); // Count of users not of type 'doctor'

            // Return the view with the fetched data
            return view('admin.dashboard', compact('hospitalCount', 'doctorCount', 'userCount'));
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Failed to fetch counts for dashboard: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
            ]);

            // Redirect back with an error message
            return redirect()->back()->withErrors(['error' => 'There was an issue fetching dashboard data. Please try again.']);
        }
    }

    public function hospital(Request $request)
    {
        $hospital = User::where('type', 'hospital')->get();
        // dd($hospital);
        return view('admin.hospital', compact('hospital'));
    }
    public function doctor(Request $request)
    {
        try {
            // Fetch all doctors from the database
            $doctors = Doctor::all();

            // Pass the fetched data to the view
            return view('admin.doctor', compact('doctors'));
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Failed to fetch doctors: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
            ]);

            // Redirect back with an error message
            return redirect()->back()->with('error', 'There was an issue fetching doctor data. Please try again.');
        }
    }

    public function user(Request $request)
    {
        try {
            // Fetch all users except those with type 'doctor'
            $users = User::where('type', '!=', 'doctor')->get();

            // Pass the fetched data to the view
            return view('admin.user', compact('users'));
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Failed to fetch users: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
            ]);

            // Redirect back with an error message
            return redirect()->back()->with('error', 'There was an issue fetching user data. Please try again.');
        }
    }

    public function addHospital(Request $request)
    {
        return view('admin.add-hospital');
    }
}
