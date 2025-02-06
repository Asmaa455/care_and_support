<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Doctor::create([
            'user_id' => 1,
            'specialization' => 'نسائية',
            'certificate_photo' => 'certificate.jpg',
            'contact_information' => '947041347',
            'clinic_location' => 'مشفى الزهراوي',
           // 'image' => 'alice_smith_image.png'
        ]);

        Doctor::create([
            'user_id' => 2,
            'specialization' => 'جراحة عامة',
            'certificate_photo' => 'certificate.jpg',
            'contact_information' => '991592972',
            'clinic_location' => 'التل',
           // 'image' => 'alice_smith_image.png'
        ]);

        Doctor::create([
            'user_id' => 3,
            'specialization' => 'جراحة عصبية مجهرية',
            'certificate_photo' => 'certificate.jpg',
            'contact_information' => '956393602',
            'clinic_location' => 'مشفى الرشيد',
            //'image' => 'alice_smith_image.png'
        ]);

        Doctor::create([
            'user_id' => 4,
            'specialization' => 'طب عام',
            'certificate_photo' => 'certificate.jpg',
            'contact_information' => '932775082',
            'clinic_location' => 'التل',
            //'image' => 'alice_smith_image.png'
        ]);

        Doctor::create([
            'user_id' => 5,
            'specialization' => 'داخلية عامة',
            'certificate_photo' => 'certificate.jpg',
            'contact_information' => '965399382',
            'clinic_location' => ' مشفى المجتهد',
            //'image' => 'alice_smith_image.png'
        ]);

        Doctor::create([
            'user_id' => 6,
            'specialization' => 'نسائية',
            'certificate_photo' => 'certificate.jpg',
            'contact_information' => '938032621',
            'clinic_location' => 'مشفى القطيفة',
            //'image' => 'alice_smith_image.png'
        ]);

        Doctor::create([
            'user_id' => 7,
            'specialization' => 'أنف أذن حنجرة',
            'certificate_photo' => 'certificate.jpg',
            'contact_information' => '994067469',
            'clinic_location' => 'مشفى المجتهد',
            //'image' => 'alice_smith_image.png'
        ]);

        Doctor::create([
            'user_id' => 8,
            'specialization' => 'جراحة عظمية',
            'certificate_photo' => 'certificate.jpg',
            'contact_information' => '991700406',
            'clinic_location' => 'مشفى التل الوطني',
            //'image' => 'alice_smith_image.png'
        ]);

        Doctor::create([
            'user_id' => 9,
            'specialization' => 'داخلية هضمية',
            'certificate_photo' => 'certificate.jpg',
            'contact_information' => '969877686',
            'clinic_location' => 'مشفى ابن النفيس',
            //'image' => 'alice_smith_image.png'
        ]);
    }
}
