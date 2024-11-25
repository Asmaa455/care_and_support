<?php

namespace App\Http\Controllers;
use App\Models\Medication_Time;
use Illuminate\Http\Request;

class Medication_TimeController extends Controller
{
    public function store(Request $request,$id)
    {
        // تخزين موعد دواء
        $Medication_Time = Medication_Time::create([
            'patient_id' => $id,
            'medication_name' => $request->medication_name,
            'amount' => $request->amount,
            'time_of_taking_the_drug' => $request->time_of_taking_the_drug,
            'daily_repetition' => $request->daily_repetition,
            'start_date' => $request->start_date,
            'duration_of_taking_the_drug' => $request->duration_of_taking_the_drug,
        ]);
        return response()->json([
            'message' => 'Medication Time stored successfully',
            'Medication_Time' => $Medication_Time
        ]);
    }
    

    public function show(string $id)
    {
         // الحصول على مواعيد الأدوية
        $Medication_Time=Medication_Time::where('patient_id',$id)->get();
        return response()->json([
            'Medication_Time' => $Medication_Time,
            'patient_id' => $id,
        ]);
    }


    public function status($id)
    {
        // تخزين الحالة الجديدة لمتابعة تناول الدواء
        $Medication_Time = Medication_Time::findOrFail($id);

        $Medication_Time->status += 1;
        $Medication_Time->save();

            return response()->json([
                'Medication_Time' => $Medication_Time
            ]);
    }




}
