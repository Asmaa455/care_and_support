<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VolunteerController extends Controller
{
    public function volunteer_data(Request $request,$id)
    {
        $image_path = $request->file('image') ? $request->file('image')->store('volunteer', 'public') : null;
        $volunteer = Volunteer::create([
            'user_id' => $id,
            'national_number' => $request->national_number,
            'contact_information' => $request->contact_information,
            'image' => $image_path,
        ]);
        return response()->json([
            'message' => 'volunteer data created successfully',
            'volunteer' => $volunteer
        ]);
    }

    public function view_volunteer_data()
    {
        // الحصول على بيانات المتطوع للبروفايل
        $user_id=Auth::user()->id;
        $volunteer=Volunteer::where('user_id',$user_id)->with('user')->get();
        return response()->json([
            'volunteer' => $volunteer,
        ]);

    }

    public function update_volunteer_data(Request $request)
    {
        $user_id=Auth::user()->id;
        $volunteer = Volunteer::where('user_id', $user_id)->firstOrFail();
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('volunteer', 'public');
            $volunteer->image = $image_path;
        }
        $volunteer->update($request->only(['contact_information']));

        $user = User::findOrFail($user_id);
        $user_data = $request->only(['first_name', 'second_name']);
        $user->update($user_data);

        return response()->json([
            'message' => 'Volunteer and user data updated successfully',
            'volunteer' => $volunteer,
            'user' => $user,
        ]);
        
    }
}
