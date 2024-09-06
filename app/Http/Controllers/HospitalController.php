<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use function Ramsey\Uuid\v1;

use Illuminate\Http\Request;
use App\Mail\UserPasswordMail;
use App\Models\DoctorHospital;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
        // Get the authenticated hospital (user with type "hospital")
        $hospital = Auth::user();
    
        // Ensure the user is authenticated and is of type 'hospital'
        if ($hospital && $hospital->type == 'hospital') {
    
            // Get all doctors that ARE already registered with this hospital
            $doctors = Doctor::whereHas('hospitals', function ($query) use ($hospital) {
                $query->where('hospital_id', $hospital->id);
            })->get();
    
            return view('hospital.doctor', compact('doctors'));
        }
    
        return redirect()->back()->with('error', 'Unauthorized access.');
    }
    
    public function payment(Request $request)
    {
        return view('hospital.payment-summery');
    }
    public function storeHospital(Request $request)
    {

        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($request->id),
            ],
            'contact' => [
                'required',
                'string',
                'max:15',
                Rule::unique('users')->ignore($request->id),
            ],
            'address' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        // Define the user type
        $userType = "doctor";
        // dd($request);
        try {
            DB::beginTransaction(); // Start the transaction

            // Check if this is an update operation (i.e., an ID is provided)
            if ($request->id) {
                // Find the existing user by ID
                $user = User::findOrFail($request->id);
                $message = 'Hospital updated successfully.';
            } else {
                // Create a new user instance
                $user = new User();
                $message = 'Hospital created successfully.';
            }

            // Update or set user attributes
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->contact = $validatedData['contact'];
            $user->address = $validatedData['address'];

            if ($request->id) {
                // Update the user with a new password if provided
                if (!empty($validatedData['password'])) {
                    $user->password = bcrypt($validatedData['password']); // Hash the password
                }
            } else {
                // Set the password for a new user
                $user->password = bcrypt($validatedData['password']); // Hash the password
                $user->created_date = now()->format('Y-m-d'); // Set created_date to the current date
            }

            $user->type = $userType;
            $user->save();

            DB::commit(); // Commit the transaction

            // Send email if the user is created or password is updated
            if (!$request->id || !empty($validatedData['password'])) {
                $this->sendMail($validatedData['email'], $validatedData['password']);
            }

            // Redirect back with a success message
            return redirect()->back()->with('success', $message);
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction in case of an error

            // Log the error for further debugging
            Log::error('User creation/update failed: ' . $e->getMessage());

            // Return back with an error message
            return back()->withErrors(['error' => 'There was an issue processing the request. Please try again later.'])->withInput();
        }
    }

    public function sendMail($email, $password)
    {

        Mail::to($email)->send(new UserPasswordMail($email, $password));
    }


    public function updateHospital(Request $request)
    {
        $hospital = User::find($request->id);

        return view('admin.add-hospital', compact('hospital'));
    }

    public function deleteHospital(Request $request)
    {
        try {
            $hospital = User::find($request->id);

            if ($hospital) {
                $hospital->delete();
                return redirect()->back()->with('success', 'Hospital record deleted successfully.');
            } else {
                return redirect()->back()->with('error', 'Hospital record not found.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the hospital record: ' . $e->getMessage());
        }
    }
}
