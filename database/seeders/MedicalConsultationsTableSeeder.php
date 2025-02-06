<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Medical_Consultation;

class MedicalConsultationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Medical_Consultation::create([
            'patient_id' => 1,
            'consultation_text' => 'آلام مستمرة في البطن.',
            'status' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Medical_Consultation::create([
            'patient_id' => 1,
            'doctor_id' => 2,
            'consultation_text' => 'ارتفاع في ضغط الدم.',
            'status' => true,
            'answer_text' => 'تغيير النظام الغذائي وممارسة الرياضة.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Medical_Consultation::create([
            'patient_id' => 1,
            'consultation_text' => 'صداع شديد مستمر.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        Medical_Consultation::create([
            'patient_id' => 2,
            'doctor_id' => 4,
            'consultation_text' => 'ألم في الصدر وضيق في التنفس.',
            'status' => true,
            'answer_text' => 'يجب إجراء فحص للقلب واستشارة أخصائي.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        Medical_Consultation::create([
            'patient_id' => 2,
            'doctor_id' => 2,
            'consultation_text' => 'دوخة مستمرة وشعور بالضعف.',
            'status' => false,
            'answer_text' => 'null',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        Medical_Consultation::create([
            'patient_id' => 2,
            'doctor_id' => 4,
            'consultation_text' => 'آلام حادة في الظهر.',
            'status' => true,
            'answer_text' => 'تناول مسكنات الألم والقيام بتمارين رياضية خفيفة.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        Medical_Consultation::create([
            'patient_id' => 3,
            'consultation_text' => 'مشاكل في الهضم وانتفاخ البطن.',
            'status' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        Medical_Consultation::create([
            'patient_id' => 3,
            'doctor_id' => 2,
            'consultation_text' => 'ارتفاع مفاجئ في درجة الحرارة.',
            'status' => true,
            'answer_text' => 'تناول أدوية خافضة للحرارة وشرب الكثير من السوائل.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
}
