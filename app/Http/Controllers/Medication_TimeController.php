<?php

namespace App\Http\Controllers;
use App\Models\Medication_Time;
use App\Models\Reminder_Time;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Medication_TimeController extends Controller
{
    public function store(Request $request)
{
    // تخزين موعد دواء
    $patient_id=Auth::user()->patient->id;
    $Medication_Time = Medication_Time::create([
        'patient_id' => $patient_id,
        'medication_name' => $request->medication_name,
        'amount' => $request->amount,
        'start_date' => $request->start_date,
        'times_per_day' => $request->times_per_day,
        'first_dose_time' => $request->first_dose_time,
        'duration_days' => $request->duration_days,
    ]);

    $interval = 24 / $request->times_per_day;
    $currentDate = new DateTime($request->start_date . ' ' . $request->first_dose_time);
    for ($day = 0; $day < $request->duration_days; $day++)
    {
        for ($dose = 0; $dose < $request->times_per_day; $dose++)
        {
            $reminderTime = (clone $currentDate)->modify("+".($dose * $interval)." hours")->format('H:i:s');
            Reminder_Time::create([
                'medication__time_id' => $Medication_Time->id,
                'date' => $currentDate->format('Y-m-d'),
                'time' => $reminderTime,
                'status' => false,
            ]);
        }
        $currentDate->modify('+1 day')->setTime((new DateTime($request->first_dose_time))->format('H'), (new DateTime($request->first_dose_time))->format('i'));
    }
    return response()->json([
        'message' => 'Medication Time stored successfully',
        'Medication_Time' => $Medication_Time,
    ]);
}

    

    public function show()
    {
         // الحصول على مواعيد الأدوية
        $patient_id=Auth::user()->patient->id;
        $Medication_Time=Medication_Time::where('patient_id',$patient_id)->with('reminder__times')->get();
        return response()->json([
            'Medication_Time' => $Medication_Time,
        ]);
    }


    public function status(Request $request,$id)
    {
        // تخزين الحالة الجديدة لمتابعة تناول الدواء
        $reminder_Time = Reminder_Time::findOrFail($id);

        $reminder_Time->update([
            'status' => $request->status,
            ]);
    }

    public function destroy($id)
    {
        Medication_Time::destroy($id);
    return response()->json([
        'message' => 'successfully',
    ]);   
    }




}
