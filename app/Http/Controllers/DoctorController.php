<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DoctorController extends Controller
{
    public function addDoctor(Request $request)
    {
        return view('admin.add-doctor');
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
                'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

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
                Doctor::create($validated);
                $message = 'Doctor added successfully';
            }

            return redirect()->back()->with('success', $message);
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error('Failed to store or update doctor: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
            ]);

            // Redirect back with an error message
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
}
