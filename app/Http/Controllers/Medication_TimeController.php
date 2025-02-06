<?php

namespace App\Http\Controllers;
use App\Models\Medication_Time;
use App\Models\Reminder_Time;
use App\Models\Patient;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\FirebaseNotificationService;

class Medication_TimeController extends Controller
{

    /*protected $notificationService;

    // التابع المنشئ لتضمين خدمة الإشعارات
    public function __construct(FirebaseNotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }*/

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
            
            /*// إعداد وقت الإشعار
            $reminderDateTime = (clone $currentDate)->modify("+".($dose * $interval)." hours");
            $this->scheduleReminderNotification($patient_id, $reminderDateTime, $request->medication_name);
            */
        }
        $currentDate->modify('+1 day')->setTime((new DateTime($request->first_dose_time))->format('H'), (new DateTime($request->first_dose_time))->format('i'));
    }
    return response()->json([
        'message' => 'Medication Time stored successfully',
        'Medication_Time' => $Medication_Time,
    ]);
}

    /* protected function scheduleReminderNotification($patient_id, DateTime $reminderDateTime, $medication_name)
    {
        // استخدام نظام جدولة المهام مثل Laravel Scheduler لإرسال الإشعار في الوقت المحدد
        $patient = Patient::find($patient_id);
        $token = $patient->user->firebase_token;

        $this->notificationService->sendNotification(
        [$token],
        'تذكير بتناول الدواء',
        'حان وقت تناول الدواء: ' . $medication_name,
        ['reminder_time' => $reminderDateTime->format('Y-m-d H:i:s'),]
    );
    }*/

    public function show()
    {
         // الحصول على مواعيد الأدوية
        $patient_id=Auth::user()->patient->id;
        $Medication_Time=Medication_Time::where('patient_id',$patient_id)->with('reminder__times')->get();
        return response()->json([
            'Medication_Time' => $Medication_Time,
        ]);
    }

    public function show_medicine($id)
    {
         // الحصول على مواعيد دواء واحد
        $patient_id=Auth::user()->patient->id;
        $Medication_Time=Medication_Time::where([
            ['patient_id', $patient_id],
            ['id', $id]
        ])->with('reminder__times')->get();
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
