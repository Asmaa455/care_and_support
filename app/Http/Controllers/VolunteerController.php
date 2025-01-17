<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VolunteerController extends Controller
{
    public function volunteer_data(Request $request)
    {
        $user_id=Auth::user()->id;
        $image_path = $request->file('image')->store('volunteer', 'public');
        $volunteer = Volunteer::create([
            'user_id' => $user_id,
            'national_number' => $request->national_number,
            'contact_information' => $request->contact_information,
            'image' => $image_path,
        ]);
        return response()->json([
            'message' => 'volunteer data created successfully',
            'volunteer' => $volunteer
        ]);
    }
}
