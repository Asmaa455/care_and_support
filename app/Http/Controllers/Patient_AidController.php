<?php

namespace App\Http\Controllers;

use App\Models\Patient_Aid;
use Illuminate\Http\Request;

class Patient_AidController extends Controller
{
    public function Acceptable_Patient_Aid()
    {
        // الحصول على طلبات المساعدة التي تم الرد عليها
        $Patient_Aid=Patient_Aid::where('status',true)->get();
        return response()->json($Patient_Aid);
    }

    public function Unacceptable_Patient_Aid(string $id)
    {
        // الحصول على طلبات المساعدة التي لم يتم الرد عليها
        $Patient_Aid=Patient_Aid::where('status',false)->get();
        return response()->json([
            'Patient_Aid' => $Patient_Aid,
            'volunteer_id' => $id,
        ]);    
    }

    public function Volunteer_Acceptance(string $id)
    {
         // الحصول على إجابات المتطوع
        $Patient_Aid=Patient_Aid::where('volunteer_id',$id)->get();
        return response()->json([
            'Patient_Aid' => $Patient_Aid,
            'volunteer_id' => $id,
        ]);
    }

    public function store_acceptance($id,$ida)
    {
        // تخزين المتطوع الذي وافق على طلب المساعدة
        $Patient_Aid = Patient_Aid::findOrFail($ida);
        $Patient_Aid->update([
            'volunteer_id'=>$id,
            'status'=>1    
            ]);
            return response()->json([
                'message' => 'volunteer stored successfully',
                'Patient_Aid' => $Patient_Aid
            ]);
    }

    public function Patient_Aid($id)
    {
        // الحصول على طلبات المساعدة للمريض
        $Patient_Aid=Patient_Aid::with((['volunteer.user','patient.user']))
        ->where('patient_id',$id)->get();
        return response()->json([
            'Patient_Aid' => $Patient_Aid,
            'patient_id' => $id,
        ]);
    }

    public function Patient_Aid_store(Request $request,$id)
    {
        // تخزين طلبات المساعدة الجديدة
        $Patient_Aid = Patient_Aid::create([
            'patient_id' => $id,
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