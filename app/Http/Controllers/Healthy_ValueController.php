<?php

namespace App\Http\Controllers;

use App\Models\Healthy_Value;
use Illuminate\Http\Request;

class Healthy_ValueController extends Controller
{
    public function store_value(Request $request,$id,$idd)
    {
        // تخزين قيمة جديدة
        /*$request->validate([
            'value' => 'required|numeric',
        ]);*/
        $Healthy_Value = Healthy_Value::create([
            'patient_id' => $id,
            'disease_id' => $idd,
            'value' => $request->value,
            'valuee' => $request->valuee,
            'status' => $request->status,
        ]);
        return response()->json([
            'message' => 'healthy value stored successfully',
            'Healthy_Value' => $Healthy_Value
        ]);    
    }

    public function show_value($id,$idd)
    {
        // الحصول على البيانات الصحية لمرض معين الخاصة بمريض معين
        $Healthy_Value=Healthy_Value::where('patient_id',$id)
        ->where('disease_id', $idd)->get();
        return response()->json($Healthy_Value); 
    }

    
    public function delete_value($id)
    {
        // حذف قيمة معينة
        Healthy_Value::findOrFail($id)->delete();
        return response()->json(['message' => 'healthy value deleted successfully']);
    }
}
