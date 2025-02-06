<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patient_Aid;

class PatientAidsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Patient_Aid::create([
            'patient_id' => 1,
            'volunteer_id' => 1,
            'aid_type' => 'دعم مالي',
            'aid_date' => '2025-02-01',
            'location' => 'مشفى دمشق',
            'additional_details' => 'نقل مريض من المنزل إلى المشفى لتلقي العلاج',
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Patient_Aid::create([
            'patient_id' => 1,
            'volunteer_id' => 2,
            'aid_type' => 'دعم مالي',
            'aid_date' => '2025-02-02',
            'location' => 'صيدلية مشفى دمشق',
            'additional_details' => 'توفير الأدوية اللازمة لعلاج مريض السرطان',
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Patient_Aid::create([
            'patient_id' => 1,
            'volunteer_id' => null,
            'aid_type' => 'دعم نفسي',
            'aid_date' => '2025-02-03',
            'location' => 'مركز الدعم النفسي',
            'additional_details' => 'جلسة دعم نفسي للتخفيف من معاناة المريض',
            'status' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Patient_Aid::create([
            'patient_id' => 2,
            'volunteer_id' => 3,
            'aid_type' => 'رعاية أطفال',
            'aid_date' => '2025-02-04',
            'location' => 'الحي',
            'additional_details' => 'جلسة علاج طبيعي لتحسين الحالة الجسدية للمريض',
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Patient_Aid::create([
            'patient_id' => 2,
            'volunteer_id' => 1,
            'aid_type' => 'دعم مالي',
            'aid_date' => '2025-02-05',
            'location' => 'مركز الإغاثة',
            'additional_details' => 'تقديم مساعدة مالية لتغطية تكاليف العلاج',
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Patient_Aid::create([
            'patient_id' => 2,
            'volunteer_id' => null,
            'aid_type' => 'دعم مالي',
            'aid_date' => '2025-02-06',
            'location' => 'منزل المريض',
            'additional_details' => 'توفير وسائل نقل للوصول إلى جلسات العلاج',
            'status' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Patient_Aid::create([
            'patient_id' => 3,
            'volunteer_id' => null,
            'aid_type' => 'دعم مالي',
            'aid_date' => '2025-02-07',
            'location' => 'عيادة الطبيب',
            'additional_details' => 'جلسة مشورة طبية حول أفضل خيارات العلاج',
            'status' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Patient_Aid::create([
            'patient_id' => 3,
            'volunteer_id' => 3,
            'aid_type' => 'الوجبات',
            'aid_date' => '2025-02-08',
            'location' => 'منزل المريض',
            'additional_details' => 'تقديم وجبات غذائية متكاملة لتحسين الحالة الصحية',
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
