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
            $doctors = Doctor::all();

            return view('hospital.doctor-addhospital', compact('doctors'));
        }

        return redirect()->back()->with('error', 'Unauthorized access.');
    }

    public function addHospital(Request $request)
    {
        // Validate request data
        $request->validate([
            'channelCategory' => 'required|string',
            'startTime' => 'required|date_format:H:i',
            'endTime' => 'required|date_format:H:i',
            'avgTime' => 'required|integer|min:1',
            'days' => 'array', // Accepts an array of days
            'days.*' => 'string', // Valid day values
        ]);

        // Find the doctor and get the authenticated hospital
        $doctor = Doctor::findOrFail($request->id);
        $hospital = Auth::user();

        // Check if the authenticated user is a hospital
        if ($hospital->type == 'hospital') {
            try {
                // Split the days string into an array
                $daysArray = explode(',', $request->days[0]);

                // Prepare the data array for insertion
                $data = [
                    'doctor_id' => $doctor->id,
                    'hospital_id' => $hospital->id,
                    'channel_name' => $request->channelCategory,
                    'start_time' => $request->startTime,
                    'end_time' => $request->endTime,
                    'avg_time' => $request->avgTime,
                    'sunday' => in_array('sunday', $daysArray) ? 'yes' : null,
                    'monday' => in_array('monday', $daysArray) ? 'yes' : null,
                    'tuesday' => in_array('tuesday', $daysArray) ? 'yes' : null,
                    'wednesday' => in_array('wednesday', $daysArray) ? 'yes' : null,
                    'thursday' => in_array('thursday', $daysArray) ? 'yes' : null,
                    'friday' => in_array('friday', $daysArray) ? 'yes' : null,
                    'saturday' => in_array('saturday', $daysArray) ? 'yes' : null,
                ];

                // Create a new DoctorHospital entry
                DoctorHospital::create($data);

                return redirect()->back()->with('success', 'Doctor added to hospital successfully.');
            } catch (\Exception $e) {
                // Log the error message (optional)
                dd($e);

                // Return back with error message
                return redirect()->back()->with('error', 'Failed to add doctor to hospital. Please try again.');
            }
        }

        return redirect()->back()->with('error', 'Unauthorized action.');
    }

    public function searchRegisterDoctor(Request $request)
    {
        // Get the authenticated hospital (user with type "hospital")
        $hospital = Auth::user();

        // Ensure the user is authenticated and is of type 'hospital'
        if ($hospital && $hospital->type == 'hospital') {
            // Initialize the query without `get()`
            $query = DoctorHospital::where('hospital_id', $hospital->id);

            // Apply search filters if provided
            if ($request->filled('name')) {
                $query->whereHas('doctor', function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->input('name') . '%');
                });
            }

            if ($request->filled('doctor_id')) {
                $query->whereHas('doctor', function ($q) use ($request) {
                    $q->where('id', $request->input('doctor_id')); // Match exact ID
                });
            }

            // Execute the query and get distinct results
            $doctors = $query->distinct('doctor_id')->get();

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
            // Initialize the query to get all doctors
            $query = Doctor::query(); // Create a new query builder instance

            // Apply search filters if provided
            if ($request->has('name') && !empty($request->input('name'))) {
                $query->where('name', 'like', '%' . $request->input('name') . '%');
            }

            if ($request->has('doctor_id') && !empty($request->input('doctor_id'))) {
                $query->where('id', 'like', '%' . $request->input('doctor_id') . '%'); // Assuming 'id' is the primary key
            }

            // Execute the query and get the results
            $doctors = $query->get(); // Fetch the results after applying filters

            return view('hospital.doctor-addhospital', compact('doctors'));
        }

        return redirect()->back()->with('error', 'Unauthorized access.');
    }
}
