<?php

namespace App\Http\Controllers;

use App\Mail\UserPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function addUser(Request $request)
    {
        return view('admin.add-user');
    }

    public function storeUser(Request $request)
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
            'role' => [
                'required',
                'string',
                'in:user,admin',
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
        // dd($request);

        try {
            DB::beginTransaction(); // Start the transaction

            // Check if this is an update operation (i.e., an ID is provided)
            if ($request->id) {
                // Find the existing user by ID
                $user = User::findOrFail($request->id);
                $message = 'User updated successfully.';
            } else {
                // Create a new user instance
                $user = new User();
                $message = 'User created successfully.';
            }

            // Update or set user attributes
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->contact = $validatedData['contact'];
            $user->address = $validatedData['address'];
            $user->type = $validatedData['role'];

            // Set the password
            $user->password = bcrypt($validatedData['password']); // Hash the password

            if (!$request->id) {
                $user->created_date = now()->format('Y-m-d'); // Set created_date to the current date for new users
            }

            $user->save();

            DB::commit(); // Commit the transaction

            // Send email if the user is created
            if (!$request->id) {
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

    public function updateUser(Request $request)
    {
        $user = User::find($request->id);
        return view('admin.add-user',compact('user'));
    }
    public function deleteUser(Request $request)
    {
        dd($request);
    }
}
