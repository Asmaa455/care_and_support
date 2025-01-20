<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DoctorController extends Controller
{


    public function doctor_data(Request $request)
    {
        $user_id=Auth::user()->id;
        $certificate_path = $request->file('certificate_photo')->store('certificate_photo', 'public');
        $image_path = $request->file('image') ? $request->file('image')->store('doctor', 'public') : null;
        $doctor = Doctor::create([
            'user_id' => $user_id,
            'specialization' => $request->specialization,
            'certificate_photo' => $certificate_path,
            'contact_information' => $request->contact_information,
            'clinic_location' => $request->clinic_location,
            'image' => $image_path,
        ]);
        $wallet = Wallet::create([
            'user_id' => $user_id,
            'current_balance' => 10,
        ]);
        return response()->json([
            'message' => 'doctor data created successfully',
            'doctor' => $doctor,
            'wallet' => $wallet
        ]);
    }

    public function view_doctor_data()
    {
        // الحصول على بيانات الطبيب للبروفايل
        $user_id=Auth::user()->id;
        $doctor=Doctor::where('user_id',$user_id)->with('user')->get();
        $wallet = Wallet::where('user_id',$user_id)->get();
        return response()->json([
            'doctor' => $doctor,
            'wallet' => $wallet,
        ]);

    }

    public function update_doctor_data(Request $request)
    {
        $user_id=Auth::user()->id;
        $doctor = Doctor::where('user_id', $user_id)->firstOrFail();
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('doctor', 'public');
            $doctor->image = $image_path;
        }
        $doctor->update($request->only(['specialization', 'contact_information', 'clinic_location']));

        $user = User::findOrFail($user_id);
        $user_data = $request->only(['first_name', 'second_name']);
        $user->update($user_data);

        return response()->json([
            'message' => 'Doctor and user data updated successfully',
            'doctor' => $doctor,
            'user' => $user,
        ]);
        
    }

    public function index()
    {
        // الحصول على قائمة الأطباء
        $Doctor=Doctor::with('user')->get();
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
