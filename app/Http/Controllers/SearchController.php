<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Registration;

class SearchController extends Controller
{
    public function index()
    {

        $user = null;
        return view('search.index', compact('user'));
    }

    public function search(Request $request)
    {
        // Validate the request input
        $request->validate([
            'nid' => 'required|string',
        ]);

        // Search for the user by NID
        $user = User::where('nid', $request->nid)->first();

        if (!$user) {
            $user = [
                "nid" =>$request->nid,
                "status" => 'Not Registered'
            ];
            return view('search.index', compact('user'));

        }
        $registration = Registration::where('user_id', $user->id)->first();
        $user = [
            "nid" =>$request->nid,
            "name" =>$user->name,
            "status" => $registration->status,
            "scheduled_date" => $registration->scheduled_date,
        ];

        return view('search.index', compact('user'));
    }
}
