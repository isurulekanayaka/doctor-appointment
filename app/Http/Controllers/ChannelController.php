<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;
use App\Models\DoctorHospital;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator; 

class ChannelController extends Controller
{

    public function channeling(Request $request)
    {
        $hospitalID = Auth::user()->id;
        $channels = DoctorHospital::where('hospital_id', $hospitalID)->get();
        // dd($channels);
        return view('hospital.channeling', compact('channels'));
    }

    public function index()
    {
        $channels = Channel::all();
        return view('hospital.channeling', compact('channels'));
    }

    public function create()
    {
        return view('channels.create');
    }

    public function storeView()
    {
        $hospitalID = Auth::user()->id;
        $channels = DoctorHospital::where('hospital_id', $hospitalID)->get();
        // dd($channels);
        return view('hospital.add-channel', compact('channels'));
    }

    public function store(Request $request)
    {
        // Validate other fields first
        $validator = Validator::make($request->all(), [
            'doctor_hospital_id' => 'required|exists:doctor_hospital,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'patient_channel_time_avg' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        // Check if validation passes
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Check for existing combination of doctor_hospital_id and date
        $existingChannel = Channel::where('doctor_hospital_id', $request->doctor_hospital_id)
            ->where('date', $request->date)
            ->where('start_time', $request->start_time)
            ->first();

        // If a combination exists, throw a validation error
        if ($existingChannel) {
            return redirect()->back()->withErrors([
                'doctor_hospital_id' => 'This doctor already has a channel on this date.',
                'date' => 'This date is already assigned to the selected doctor.',
            ])->withInput();
        }

        // Use try-catch to handle any database errors or other issues
        try {
            // If no errors, create the channel
            Channel::create($request->all());

            return redirect()->back()->with('success', 'Channel created successfully.');
        } catch (QueryException $e) {
            // Handle database errors or any other exceptions
            return redirect()->back()->withErrors([
                'error' => 'There was an issue saving the channel. Please try again.',
            ])->withInput();
        }
    }

    public function edit(Channel $channel)
    {
        return view('channels.edit', compact('channel'));
    }

    public function update(Request $request, Channel $channel)
    {
        $request->validate([
            'doctor_hospital_id' => 'required|exists:doctor_hospital,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'patient_channel_time_avg' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $channel->update($request->all());

        return redirect()->route('channels.index')->with('success', 'Channel updated successfully.');
    }

    public function destroy(Channel $channel)
    {
        $channel->delete();

        return redirect()->route('channels.index')->with('success', 'Channel deleted successfully.');
    }
}
