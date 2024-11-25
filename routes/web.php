<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Medical_ConsultationController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(Medical_ConsultationController::class)->group(function () {

    Route::get('Medical_Consultation/Answered_Medical_Consultation','Answered_Medical_Consultation');
    Route::get('Medical_Consultation/Unanswered_Medical_Consultations/{id}','Unanswered_Medical_Consultations');
    Route::get('Medical_Consultation/Doctor_s_Answers/{id}','Doctor_s_Answers');
    Route::Post('Medical_Consultation/doctor_answer_create/store/{id}/{idc}','store_answer');
    Route::get('Medical_Consultation/doctor_answer_create/{id}/{idc}','create_answer');
    Route::get('Medical_Consultation/patient_consultation/{id}','patient_consultation');   
    Route::get('Medical_Consultation/patient_consultation_create/{id}','create_Medical_Consultation');
    Route::Post('Medical_Consultation/patient_consultation_store/{id}','store_Medical_Consultation');
});
