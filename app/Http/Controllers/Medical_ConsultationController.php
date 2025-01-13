<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Exception;
use App\Models\Medical_Consultation;
use Illuminate\Http\Request;
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


    public function Unanswered_Medical_Consultations(string $id)
    {
        // الحصول على الاستشارات الطبية التي لم يتم الرد عليها
        $Medical_Consultation=Medical_Consultation::where('status',false)
        ->orderBy('created_at', 'desc')->get();
        return response()->json([
            'consultations' => $Medical_Consultation,
            'doctor_id' => $id,
        ]);

    }

    public function Doctor_s_Answers(string $id)
    {
         // الحصول على إجابات الطبيب
        $Medical_Consultation=Medical_Consultation::where('doctor_id',$id)
        ->orderBy('created_at', 'desc')->get();
        return response()->json([
            'consultations' => $Medical_Consultation,
            'doctor_id' => $id,
        ]);

    }


    public function store_answer(Request $request,$id,$idc)
    {
        // تخزين الإجابة الجديدة
        $request->validate([
            'answer_text' => 'required|string',
            ]);
        $Medical_Consultation = Medical_Consultation::findOrFail($idc);
        $Medical_Consultation->update([
            'doctor_id'=>$id,
            'answer_text'=>$request->answer_text,
            'status'=>1,
            ]);
            return response()->json([
                'message' => 'Answer stored successfully',
                'consultation' => $Medical_Consultation,
            ]);
        
    }


    public function patient_consultation($id)
    {
        // الحصول على الاستشارات الطبية للمريض
        $medical_consultation=Medical_Consultation::with((['doctor.user','patient.user']))
        ->where('patient_id',$id)->orderBy('created_at', 'desc')->get();
        return response()->json([
            'consultations' => $medical_consultation,
            'patient_id' => $id,
        ]);

    }


    public function store_Medical_Consultation(Request $request,$id)
    {
        // تخزين الاستشارة الطبية الجديدة
        $request->validate([
            'consultation_text' => 'required|string',
        ]);
        $medical_consultation = Medical_Consultation::create([
            'patient_id' => $id,
            'consultation_text' => $request->consultation_text,
        ]);
        return response()->json([
            'message' => 'Medical consultation created successfully',
            'consultation' => $medical_consultation
        ]);

    }
    
}
