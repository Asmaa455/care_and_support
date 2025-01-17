<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Exception;
use App\Models\Medical_Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use StripeStripe;
use StripePaymentIntent;


class Medical_ConsultationController extends Controller
{
    
    public function Answered_Medical_Consultation()
    {
        // الحصول على الاستشارات الطبية التي تم الرد عليها
        $Medical_Consultation=Medical_Consultation::where('status',true)
        ->orderBy('created_at', 'desc')->get();
        return response()->json($Medical_Consultation,200);
    }


    public function Unanswered_Medical_Consultations()
    {
        // الحصول على الاستشارات الطبية التي لم يتم الرد عليها
        $Medical_Consultation=Medical_Consultation::where('status',false)
        ->orderBy('created_at', 'desc')->get();
        return response()->json([
            'consultations' => $Medical_Consultation,
        ]);

    }

    public function Doctor_s_Answers()
    {
         // الحصول على إجابات الطبيب
        $doctor_id=Auth::user()->doctor->id;
        $Medical_Consultation=Medical_Consultation::where('doctor_id',$doctor_id)
        ->orderBy('created_at', 'desc')->get();
        return response()->json([
            'consultations' => $Medical_Consultation,
        ]);
    }


    public function store_answer(Request $request,$id)
    {
        // تخزين الإجابة الجديدة
        $request->validate([
            'answer_text' => 'required|string',
            ]);
        $doctor_id=Auth::user()->doctor->id;
        $Medical_Consultation = Medical_Consultation::findOrFail($id);
        $Medical_Consultation->update([
            'doctor_id'=>$doctor_id,
            'answer_text'=>$request->answer_text,
            'status'=>1,
            ]);
            return response()->json([
                'message' => 'Answer stored successfully',
                'consultation' => $Medical_Consultation,
            ]);
        
    }


    public function patient_consultation()
    {
        // الحصول على الاستشارات الطبية للمريض
        $patient_id=Auth::user()->patient->id;
        $medical_consultation=Medical_Consultation::with((['doctor.user','patient.user']))
        ->where('patient_id',$patient_id)->orderBy('created_at', 'desc')->get();
        return response()->json([
            'consultations' => $medical_consultation,
        ]);

    }


    public function store_Medical_Consultation(Request $request)
    {
        // تخزين الاستشارة الطبية الجديدة
        $request->validate([
            'consultation_text' => 'required|string',
        ]);
        $patient_id=Auth::user()->patient->id;
        $medical_consultation = Medical_Consultation::create([
            'patient_id' => $patient_id,
            'consultation_text' => $request->consultation_text,
        ]);
        return response()->json([
            'message' => 'Medical consultation created successfully',
            'consultation' => $medical_consultation
        ]);

    }
    
}
