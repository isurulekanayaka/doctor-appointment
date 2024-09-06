<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('auth.login');
    }

    public function registerView()
    {
        return view('auth.register');
    }
    public function userProfile()
    {
        return view('user.profile');
    }
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'contact' => 'required|string|max:20|unique:users,contact',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            DB::beginTransaction(); // Start the transaction

            // Check if the email or contact already exists
            if (
                User::where('email', $validatedData['email'])->exists() ||
                User::where('contact', $validatedData['contact'])->exists()
            ) {
                return back()->withErrors([
                    'email' => 'The provided email or contact number is already in use.'
                ])->withInput();
            }

            // Create a new user instance and save it to the database
            $user = new User();
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->contact = $validatedData['contact'];
            $user->address = $validatedData['address'];
            $user->password = bcrypt($validatedData['password']); // Hash the password
            $user->created_date = now()->format('Y-m-d'); // Set created_date to the current date
            $user->save();

            DB::commit(); // Commit the transaction

            // Redirect to the login page with a success message
            return redirect()->route('user.login')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction in case of an error

            // Log the error for further debugging
            Log::error('User creation failed: ' . $e->getMessage());

            // Return back with an error message
            return back()->withErrors(['error' => 'There was an issue creating the user. Please try again later.'])->withInput();
        }
    }

    public function login(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        try {
            // Attempt to authenticate the user
            if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
                // Authentication passed...
                $user = Auth::user();

                // Check the user's role and redirect to the appropriate dashboard
                switch ($user->type) {
                    case 'admin':
                        return redirect()->route('admin.dashboard')->with('success', 'Welcome to the Admin Dashboard.');
                    case 'hospital':
                        return redirect()->route('hospital.dashboard')->with('success', 'Welcome to the Hospital Dashboard.');
                    case 'user':
                    default:
                        return redirect()->route('userhome.index')->with('success', 'Welcome to the Home Page.');
                }
            }

            // Authentication failed, return back with an error
            return back()->withErrors(['email' => 'The provided credentials do not match our records.'])->withInput();
        } catch (\Exception $e) {
            // Log the error for further debugging
            Log::error('Login failed: ' . $e->getMessage());

            // Return back with an error message
            return back()->withErrors(['error' => 'There was an issue with your login. Please try again later.'])->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Log out the user

        $request->session()->invalidate(); // Invalidate the session

        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect('/login'); // Redirect to login page or home page
    }
}
