<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Volunteer;
use App\Models\Patient_Aid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\FirebaseNotificationService;

class Patient_AidController extends Controller
{

    /* protected $notificationService;

    // التابع المنشئ لتضمين خدمة الإشعارات
    public function __construct(FirebaseNotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }*/

    public function Acceptable_Patient_Aid()
    {
        // الحصول على طلبات المساعدة التي تم الرد عليها
        $Patient_Aid=Patient_Aid::with((['volunteer.user','patient.user']))
        ->where('status',true)->get();
        return response()->json($Patient_Aid);
    }

    public function Unacceptable_Patient_Aid()
    {
        // الحصول على طلبات المساعدة التي لم يتم الرد عليها
        $Patient_Aid=Patient_Aid::with((['patient.user']))->
        where('status',false)->get();
        return response()->json([
            'Patient_Aid' => $Patient_Aid,
        ]);    
    }

    public function Volunteer_Acceptance()
    {
         // الحصول على إجابات المتطوع
        $volunteer_id=Auth::user()->volunteers->id;
        $Patient_Aid=Patient_Aid::with((['patient.user']))->
        where('volunteer_id',$volunteer_id)->get();
        return response()->json([
            'Patient_Aid' => $Patient_Aid,
        ]);
    }

    public function store_acceptance($id)
    {
        // تخزين المتطوع الذي وافق على طلب المساعدة
        $volunteer_id=Auth::user()->volunteers->id;
        $Patient_Aid = Patient_Aid::findOrFail($id);
        $Patient_Aid->update([
            'volunteer_id'=>$volunteer_id,
            'status'=>1    
            ]);

            
        /*$patientToken = $Patient_Aid->patient->user->firebase_token;
        $this->notificationService->sendNotification(
            $patientToken,
            'تم قبول طلب مساعدتك',
            'لقد وافق متطوع على طلب مساعدتك.'
        );*/

        return response()->json([
            'message' => 'volunteer stored successfully',
        ]);
    }

    public function Patient_Aid()
    {
        // الحصول على طلبات المساعدة للمريض
        $patient_id=Auth::user()->patient->id;
        $Patient_Aid=Patient_Aid::with((['volunteer.user','patient.user']))
        ->where('patient_id',$patient_id)->get();
        return response()->json([
            'Patient_Aid' => $Patient_Aid,
        ]);
    }

    public function Patient_Aid_store(Request $request)
    {
        // تخزين طلبات المساعدة الجديدة
        $request->validate([
            'aid_type' => 'required|string',
            'aid_date' => 'required|date',
            'location' => 'required|string',
            'additional_details' => 'nullable|string',
        ]);

        $patient_id=Auth::user()->patient->id;
        $patient = Patient::find($patient_id);
        if (is_null($patient->paper_to_prove_cancer)) {
            return response()->json([ 'message' => 'Request cannot be accepted without paper to prove cancer' ],
            400); 
        }
        $Patient_Aid = Patient_Aid::create([
            'patient_id' => $patient_id,
            'aid_type' => $request->aid_type,
            'aid_date' => $request->aid_date,
            'location' => $request->location,
            'additional_details' => $request->additional_details,
        ]);

        /* // إرسال إشعار لكل المتطوعين
        $volunteers = Volunteer::all();
        foreach ($volunteers as $volunteer) {
            $token = $volunteer->user->firebase_token;
            $this->notificationService->sendNotification(
                $token,
                'طلب مساعدة جديد',
                'هناك طلب مساعدة جديد من المريض ' . Auth::user()->name,
                ['aid_id' => $Patient_Aid->id]
            );
        }*/

        return response()->json([
            'message' => 'Ask for help created successfully',
            'Patient_Aid' => $Patient_Aid
        ]);
    }

    public function Aid_Statistics()
    {
        // إحصاءات المساعدة
        $totalRequests = Patient_Aid::count();
        $acceptedRequests = Patient_Aid::where('status', true)->count();
        $popularAidTypes = Patient_Aid::select('aid_type',DB::raw('count(*) as total'))
            ->groupBy('aid_type')
            ->orderBy('total', 'desc')
            ->get();
            
        return response()->json([
            'total_requests' => $totalRequests,
            'accepted_requests' => $acceptedRequests,
            'popular_aid_types' => $popularAidTypes,
        ]);
    }

    public function Monthly_Reports(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $request->validate([
            'month' => 'required|integer',
            'year' => 'required|integer'
        ]);

        $month = $request->input('month');
        $year = $request->input('year');

        // جلب التقرير الشهري بناءً على الشهر والسنة المدخلين
        $totalRequests = Patient_Aid::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->count();

        $acceptedRequests = Patient_Aid::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->where('status', true)
            ->count();

        return response()->json([
            'month' => $month,
            'year' => $year,
            'total_requests' => $totalRequests,
            'accepted_requests' => $acceptedRequests,
        ]);
    }
}
