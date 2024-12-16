<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class VaccineShedule extends Controller
{
    public function page(){
        return view('admin.index');
    }

    public function index (){
        $data = Registration::with('user','center')->get();

        return response()->json($data,200);
    }

    public function updateRecord(Request $request, $id)
    {
        $record = Registration::find($id);

        if ($record) {
            $record->scheduled_date = $request->schedule_date;
            $record->status = $request->status;
            $record->save();

            return response()->json(['success' => true, 'message' => 'Record updated successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Record not found.']);
    }

}
