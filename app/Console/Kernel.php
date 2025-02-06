<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Reminder_Time;
use App\Services\FirebaseNotificationService;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $now = now();
            $reminders = Reminder_Time::where('date', $now->format('Y-m-d'))
                ->where('time', $now->format('H:i:s'))
                ->where('status', false)
                ->get();

            foreach ($reminders as $reminder) {
                $patient = $reminder->medication_time->patient;
                $token = $patient->user->firebase_token;
                app(FirebaseNotificationService::class)->sendNotification(
                    $token,
                    'تذكير بتناول الدواء',
                    'حان وقت تناول الدواء: ' . $reminder->medication_time->medication_name
                );
            }
        })->everyMinute();
    }
}
