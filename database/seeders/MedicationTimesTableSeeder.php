<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Medication_Time;
use App\Models\Reminder_Time;
use DateTime;

class MedicationTimesTableSeeder extends Seeder
{
    public function run()
    {
        $medications = [
            [
                'patient_id' => 1,
                'medication_name' => 'Paracetamol',
                'amount' => '500 mg',
                'start_date' => '2025-02-01',
                'times_per_day' => 3,
                'first_dose_time' => '08:00:00',
                'duration_days' => 7
            ],
            [
                'patient_id' => 1,
                'medication_name' => 'Ibuprofen',
                'amount' => '200 mg',
                'start_date' => '2025-02-02',
                'times_per_day' => 2,
                'first_dose_time' => '09:00:00',
                'duration_days' => 5,
            ],
            [
                'patient_id' => 1,
                'medication_name' => 'Aspirin',
                'amount' => '100 mg',
                'start_date' => '2025-02-03',
                'times_per_day' => 1,
                'first_dose_time' => '10:00:00',
                'duration_days' => 10,
            ],
            [
                'patient_id' => 2,
                'medication_name' => 'Metformin',
                'amount' => '850 mg',
                'start_date' => '2025-02-04',
                'times_per_day' => 2,
                'first_dose_time' => '08:30:00',
                'duration_days' => 3,
            ],
            [
                'patient_id' => 2,
                'medication_name' => 'Atorvastatin',
                'amount' => '40 mg',
                'start_date' => '2025-02-05',
                'times_per_day' => 1,
                'first_dose_time' => '20:00:00',
                'duration_days' => 9,
            ],
            [
                'patient_id' => 2,
                'medication_name' => 'Lisinopril',
                'amount' => '10 mg',
                'start_date' => '2025-02-06',
                'times_per_day' => 1,
                'first_dose_time' => '07:00:00',
                'duration_days' => 6,
            ],
            [
                'patient_id' => 3,
                'medication_name' => 'Amoxicillin',
                'amount' => '500 mg',
                'start_date' => '2025-02-07',
                'times_per_day' => 3,
                'first_dose_time' => '11:00:00',
                'duration_days' => 10,
            ],
            [
                'patient_id' => 3,
                'medication_name' => 'Omeprazole',
                'amount' => '20 mg',
                'start_date' => '2025-02-08',
                'times_per_day' => 1,
                'first_dose_time' => '08:00:00',
                'duration_days' => 14,
            ]
        ];

        foreach ($medications as $medicationData) {
            $medicationTime = Medication_Time::create([
                'patient_id' => $medicationData['patient_id'],
                'medication_name' => $medicationData['medication_name'],
                'amount' => $medicationData['amount'],
                'start_date' => $medicationData['start_date'],
                'times_per_day' => $medicationData['times_per_day'],
                'first_dose_time' => $medicationData['first_dose_time'],
                'duration_days' => $medicationData['duration_days'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $interval = 24 / $medicationData['times_per_day'];
            $currentDate = new DateTime($medicationData['start_date'] . ' ' . $medicationData['first_dose_time']);

            for ($day = 0; $day < $medicationData['duration_days']; $day++) {
                for ($dose = 0; $dose < $medicationData['times_per_day']; $dose++) {
                    $reminderTime = (clone $currentDate)->modify("+".($dose * $interval)." hours")->format('H:i:s');
                    Reminder_Time::create([
                        'medication__time_id' => $medicationTime->id,
                        'date' => $currentDate->format('Y-m-d'),
                        'time' => $reminderTime,
                        'status' => false,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
                $currentDate->modify('+1 day')->setTime((new DateTime($medicationData['first_dose_time']))->format('H'), (new DateTime($medicationData['first_dose_time']))->format('i'));
            }
        }
    }
}
