<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medical_Consultation;

class Medical_ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Medical_Consultation=Medical_Consultation::all();
        return view('Medical_Consultation_doctor.Medical_Consultation',compact('Medical_Consultation'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function patient_consultation($id)
    {
        //$Medical_Consultation
        $medical_consultation=Medical_Consultation::where('patient_id',$id)->get();
        return view('Medical_Consultation_patient.View_Medical_Consultation',compact('medical_consultation','id'));
    }
    public function create_Medical_Consultation($id){

        return view('Medical_Consultation_patient.Medical_Consultation_create',compact('id'));
    }

    public function store_Medical_Consultation(Request $request,$id)
    {
        Medical_Consultation::create([
            'patient_id'=>$id,
            'consultation_text'=>$request->consultation_text,
            'status'=>'لم يتم الإجابة بعد'
        ]);
        return redirect()->route('view',$id);
    }
    
}
