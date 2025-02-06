<?php

namespace App\Http\Controllers;

use App\Models\Healthy_Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Healthy_ValueController extends Controller
{
    public function store_value(Request $request,$id)
    {
        // تخزين قيمة جديدة
        $request->validate([
            'value' => 'required|integer',
            'valuee' => 'nullable|integer',
            'status' => 'nullable|string',
        ]);


        $patient_id=Auth::user()->patient->id;
        $Healthy_Value = Healthy_Value::create([
            'patient_id' => $patient_id,
            'disease_id' => $id,
            'value' => $request->value,
            'valuee' => $request->valuee, 
            'status' => $request->status,
        ]);
        return response()->json([
            'message' => 'healthy value stored successfully',
            'Healthy_Value' => $Healthy_Value
        ]);
    }

    public function show_value($id)
    {
        // الحصول على البيانات الصحية لمرض معين الخاصة بمريض معين

        $patient_id=Auth::user()->patient->id;
        $Healthy_Value=Healthy_Value::where('patient_id',$patient_id)
        ->where('disease_id', $id)->get();
        return response()->json($Healthy_Value); 
    }

    
    public function delete_value($id)
    {
        // حذف قيمة معينة
        Healthy_Value::findOrFail($id)->delete();
        return response()->json(['message' => 'healthy value deleted successfully']);
    }
}
