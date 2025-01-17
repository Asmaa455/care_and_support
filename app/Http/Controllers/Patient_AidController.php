<?php

namespace App\Http\Controllers;

use App\Models\Patient_Aid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Patient_AidController extends Controller
{
    public function Acceptable_Patient_Aid()
    {
        // الحصول على طلبات المساعدة التي تم الرد عليها
        $Patient_Aid=Patient_Aid::where('status',true)->get();
        return response()->json($Patient_Aid);
    }

    public function Unacceptable_Patient_Aid()
    {
        // الحصول على طلبات المساعدة التي لم يتم الرد عليها
        $Patient_Aid=Patient_Aid::where('status',false)->get();
        return response()->json([
            'Patient_Aid' => $Patient_Aid,
        ]);    
    }

    public function Volunteer_Acceptance()
    {
         // الحصول على إجابات المتطوع
        $volunteer_id=Auth::user()->volunteers->id;
        $Patient_Aid=Patient_Aid::where('volunteer_id',$volunteer_id)->get();
        return response()->json([
            'Patient_Aid' => $Patient_Aid,
        ]);
    }

    public function store_acceptance($id)
    {
        // تخزين المتطوع الذي وافق على طلب المساعدة
        $volunteer_id=Auth::user()->volunteers->id;
        $Patient_Aid = Patient_Aid::findOrFail($id);
        $Patient_Aid->update([
            'volunteer_id'=>$volunteer_id,
            'status'=>1    
            ]);
            return response()->json([
                'message' => 'volunteer stored successfully',
              //  'Patient_Aid' => $Patient_Aid
            ]);
    }

    public function Patient_Aid()
    {
        // الحصول على طلبات المساعدة للمريض
        $patient_id=Auth::user()->patient->id;
        $Patient_Aid=Patient_Aid::with((['volunteer.user','patient.user']))
        ->where('patient_id',$patient_id)->get();
        return response()->json([
            'Patient_Aid' => $Patient_Aid,
        ]);
    }

    public function Patient_Aid_store(Request $request)
    {
        // تخزين طلبات المساعدة الجديدة
        $request->validate([
            'aid_type' => 'required|string',
            'aid_date' => 'required|date',
            'location' => 'required|string',
            'additional_details' => 'nullable|string',
        ]);

        $patient_id=Auth::user()->patient->id;
        $Patient_Aid = Patient_Aid::create([
            'patient_id' => $patient_id,
            'aid_type' => $request->aid_type,
            'aid_date' => $request->aid_date,
            'location' => $request->location,
            'additional_details' => $request->additional_details,
        ]);
        return response()->json([
            'message' => 'Ask for help created successfully',
            'Patient_Aid' => $Patient_Aid
        ]);
    }
}
