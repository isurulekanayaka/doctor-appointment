<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\DoctorHospital;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function addDoctor(Request $request)
    {
        return view('admin.add-doctor');
    }

    // hospital panel
    public function addnewDoctor(Request $request)
    {
        return view('hospital.add-newdoctor');
    }

    public function storeDoctor(Request $request)
    {

        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:doctors,email,' . $request->id,
                'contact' => 'required|string|max:15',
                'specialty' => 'required|string|max:255',
                'qualifications' => 'required|string|max:255',
                'address' => 'required|string',
                'experience' => 'required|integer|min:0',
                'profile_image' => 'nullable',
                'doctor_id' => 'required|unique:doctors'
            ]);
            // dd($request);
            // Handle file upload if a new image is provided
            if ($request->hasFile('profile_image')) {
                $fileName = time() . '.' . $request->profile_image->extension();
                $request->profile_image->move(public_path('profile'), $fileName);
                $validated['profile_image'] = $fileName;
            }

            // Check if the request has an 'id' to update or create a new record
            if ($request->has('id') && $request->id) {
                $doctor = Doctor::findOrFail($request->id);
                $doctor->update($validated);
                $message = 'Doctor updated successfully';
            } else {
                $doctor = Doctor::create($validated);
                $message = 'Doctor added successfully';
                $user = Auth::user();
                // dd($user);
                if ($user->type == 'hospital') {
                    DoctorHospital::create([
                        'doctor_id' => $doctor->id,
                        'hospital_id' => $user->id, // Assuming the user is the hospital
                    ]);
                    $message = 'Doctor added successfully and assigned to the hospital';
                }
            }

            return redirect()->back()->with('success', $message);
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error('Failed to store or update doctor: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
            ]);
            // Redirect back with an error message
            dd($e);
            return redirect()->back()->with('error', 'There was an issue saving the doctor. Please try again.');
        }
    }

    public function updateDoctor(Request $request)
    {
        try {
            // Find the doctor by ID
            $doctor = Doctor::findOrFail($request->id);

            // Pass the doctor data to the view
            return view('admin.add-doctor', compact('doctor'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the doctor is not found
            Log::error('Doctor not found: ' . $e->getMessage(), [
                'request_id' => $request->id,
                'stack' => $e->getTraceAsString(),
            ]);

            // Redirect back with an error message
            return redirect()->back()->withErrors(['error' => 'Doctor not found.']);
        } catch (\Exception $e) {
            // Handle other possible exceptions
            Log::error('Failed to update doctor: ' . $e->getMessage(), [
                'request_id' => $request->id,
                'stack' => $e->getTraceAsString(),
            ]);

            // Redirect back with a generic error message
            return redirect()->back()->withErrors(['error' => 'There was an issue processing your request. Please try again later.']);
        }
    }

    public function deleteDoctor(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'id' => 'required|integer|exists:doctors,id',
        ]);

        try {
            // Find the doctor by ID and delete it
            $doctor = Doctor::findOrFail($validated['id']);
            $doctor->delete();

            // Redirect with a success message
            return redirect()->back()->with('success', 'Doctor deleted successfully.');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Failed to delete doctor: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
            ]);

            // Redirect with an error message
            return redirect()->back()->with('error', 'There was an issue deleting the doctor. Please try again.');
        }
    }


    public function doctorAddHospital()
    {
        // Get the authenticated hospital (user with type "hospital")
        $hospital = Auth::user();

        // Ensure the user is authenticated and is of type 'hospital'
        if ($hospital && $hospital->type == 'hospital') {

            // Get all doctors that are NOT already registered with this hospital
            $doctors = Doctor::whereDoesntHave('hospitals', function ($query) use ($hospital) {
                $query->where('hospital_id', $hospital->id);
            })->get();

            return view('hospital.doctor-addhospital', compact('doctors'));
        }

        return redirect()->back()->with('error', 'Unauthorized access.');
    }

    public function addHospital($doctor_id)
    {
        $doctor = Doctor::findOrFail($doctor_id);
        $hospital = Auth::user();

        if ($hospital->type == 'hospital') {
            DoctorHospital::create([
                'doctor_id' => $doctor->id,
                'hospital_id' => $hospital->id,
            ]);
            return redirect()->back()->with('success', 'Doctor added to hospital successfully.');
        }

        return redirect()->back()->with('error', 'Unauthorized action.');
    }

    public function searchRegisterDoctor(Request $request)
    {

        // Get the authenticated hospital (user with type "hospital")
        $hospital = Auth::user();

        // Ensure the user is authenticated and is of type 'hospital'
        if ($hospital && $hospital->type == 'hospital') {

            // Initialize the query to get doctors registered with the hospital
            $query = Doctor::whereHas('hospitals', function ($query) use ($hospital) {
                $query->where('hospital_id', $hospital->id);
            });

            // Apply search filters if provided
            if ($request->has('name') && !empty($request->input('name'))) {
                $query->where('name', 'like', '%' . $request->input('name') . '%');
            }

            if ($request->has('doctor_id') && !empty($request->input('doctor_id'))) {
                $query->where('doctor_id', 'like', '%' . $request->input('doctor_id') . '%');
            }

            // Execute the query and get the results
            $doctors = $query->get();

            return view('hospital.doctor', compact('doctors'));
        }

        return redirect()->back()->with('error', 'Unauthorized access.');
    }

    public function searchNonRegisterDoctor(Request $request)
    {
        // Get the authenticated hospital (user with type "hospital")
        $hospital = Auth::user();

        // Ensure the user is authenticated and is of type 'hospital'
        if ($hospital && $hospital->type == 'hospital') {

            // Initialize the query to get doctors registered with the hospital
            $query = Doctor::whereDoesntHave('hospitals', function ($query) use ($hospital) {
                $query->where('hospital_id', $hospital->id);
            });

            // Apply search filters if provided
            if ($request->has('name') && !empty($request->input('name'))) {
                $query->where('name', 'like', '%' . $request->input('name') . '%');
            }

            if ($request->has('doctor_id') && !empty($request->input('doctor_id'))) {
                $query->where('doctor_id', 'like', '%' . $request->input('doctor_id') . '%');
            }

            // Execute the query and get the results
            $doctors = $query->get();

            return view('hospital.doctor-addhospital', compact('doctors'));
        }

        return redirect()->back()->with('error', 'Unauthorized access.');
    }
}
