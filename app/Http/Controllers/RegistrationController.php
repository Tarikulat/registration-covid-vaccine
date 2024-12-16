<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VaccineCenter;
use App\Models\Registration;
use Carbon\Carbon;

class RegistrationController extends Controller
{
    public function create()
    {
        $today = now()->startOfDay();
        $centers = VaccineCenter::with(['bookedSlots' => function ($query) use ($today) {
            $query->whereDate('created_at', $today);
        }])->get();

        foreach ($centers as $center) {
            $bookedCount = $center->bookedSlots->count();
            $center->remaining_slots = $center->capacity - $bookedCount;
        }

        return view('registration.create', compact('centers'));
    }


    public function store(Request $request)
    {

        // Validate the incoming data
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|email|unique:users,email',
            'nid'               => 'required|unique:users,nid',
            'dob'               => 'required|date',
            'vaccine_center_id' => 'required|exists:vaccine_centers,id',
        ]);

        // Create a new user
        $user = User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'nid'   => $request->nid,
            'dob'   => $request->dob,
        ]);

        // Create a registration entry
        Registration::create([
            'user_id'           => $user->id,
            'vaccine_center_id' => $request->vaccine_center_id,
        ]);

        // Redirect with a success message
        return redirect('/')->with('user', $user);
    }
}
