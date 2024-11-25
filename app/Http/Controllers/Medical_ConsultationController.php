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
        $Medical_Consultation=Medical_Consultation::where('status',true)->get();
        return response()->json($Medical_Consultation,200);
    }


    public function Unanswered_Medical_Consultations(string $id)
    {
        // الحصول على الاستشارات الطبية التي لم يتم الرد عليها
        $Medical_Consultation=Medical_Consultation::where('status',false)->get();
        return response()->json([
            'consultations' => $Medical_Consultation,
            'doctor_id' => $id,
        ]);

    }

    public function Doctor_s_Answers(string $id)
    {
         // الحصول على إجابات الطبيب
        $Medical_Consultation=Medical_Consultation::where('doctor_id',$id)->get();
        return response()->json([
            'consultations' => $Medical_Consultation,
            'doctor_id' => $id,
        ]);
        /*return view('Medical_Consultation_doctor.Doctor_s_Answers',
        compact('Medical_Consultation','id'));*/
    }


    public function store_answer(Request $request,$id,$idc)
    {
        // تخزين الإجابة الجديدة


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
        $medical_consultation=Medical_Consultation::with((['doctor.user','patient.user']))->where('patient_id',$id)->get();
        return response()->json([
            'consultations' => $medical_consultation,
            'patient_id' => $id,
        ]);
        /*return view('Medical_Consultation_patient.View_Medical_Consultation',
        compact('medical_consultation','id'));*/
    }


    public function store_Medical_Consultation(Request $request,$id)
    {
        // تخزين الاستشارة الطبية الجديدة
        $medical_consultation = Medical_Consultation::create([
            'patient_id' => $id,
            'consultation_text' => $request->consultation_text,
        ]);
        return response()->json([
            'message' => 'Medical consultation created successfully',
            'consultation' => $medical_consultation
        ]);
        /*return redirect()->route('Medical_Consultation.patient_consultation', $id);*/
    }
    
}
