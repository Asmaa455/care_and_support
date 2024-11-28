<?php

namespace App\Http\Controllers;
use App\Models\Doctor;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        // الحصول على قائمة الأطباء
        $Doctor=Doctor::get();
        return response()->json($Doctor);
    }


    public function search(Request $request)
{
    // بناء الاستعلام الأساسي للأطباء مع العلاقة المحملة
    $request->validate([
        'name' => 'sometimes|string',
        'specialization' => 'sometimes|string',
        'clinic_location' => 'sometimes|string',
    ]);
    $query = Doctor::with('user');

    // البحث حسب الاسم من جدول المستخدمين
    if ($request->filled('name')) {
        $query->whereHas('user', function ($q) use ($request) {
            $q->where('first_name', 'LIKE', '%' . $request->input('name') . '%');
        });
    }

    // البحث حسب التخصص
    if ($request->filled('specialization')) {
        $query->where('specialization', $request->input('specialization'));
    }

    // البحث حسب الموقع
    if ($request->filled('clinic_location')) {
        $query->where('clinic_location', $request->input('clinic_location'));
    }

    // الحصول على النتائج
    $doctors = $query->get();

    // تشكيل النتائج لإرجاع معلومات الطبيب مع معلومات المستخدم
    $results = $doctors->map(function ($doctor) {
        return [
            'doctor_id' => $doctor->id,
            'specialization' => $doctor->specialization,
            'clinic_location' => $doctor->clinic_location,
            'contact_information' => $doctor->contact_information,
            'user' => [
                'first_name' => $doctor->user->first_name,
                'second_name' => $doctor->user->second_name,
                'email' => $doctor->user->email,
            ],
        ];
    });

    return response()->json($results);
}

}
