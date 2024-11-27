<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Medical_ConsultationController;
use App\Http\Controllers\Patient_AidController;
use App\Http\Controllers\Medication_TimeController;
use App\Http\Controllers\Healthy_ValueController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\Awareness_PostController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::controller(Medical_ConsultationController::class)->group(function () {

    Route::get('Medical_Consultation/Answered_Medical_Consultation','Answered_Medical_Consultation');
    Route::get('Medical_Consultation/Unanswered_Medical_Consultations/{id}','Unanswered_Medical_Consultations');
    Route::get('Medical_Consultation/Doctor_s_Answers/{id}','Doctor_s_Answers');
    Route::Post('Medical_Consultation/doctor_answer_create/store/{id}/{idc}','store_answer');
    Route::get('Medical_Consultation/patient_consultation/{id}','patient_consultation');   
    Route::Post('Medical_Consultation/patient_consultation_store/{id}','store_Medical_Consultation');
});


Route::controller(Patient_AidController::class)->group(function () {

    Route::get('Patient_Aid/Acceptable_Patient_Aid','Acceptable_Patient_Aid');
    Route::get('Patient_Aid/Unacceptable_Patient_Aid/{id}','Unacceptable_Patient_Aid');
    Route::get('Patient_Aid/Volunteer_Acceptance/{id}','Volunteer_Acceptance');
    Route::get('Patient_Aid/Volunteer_acceptance_create/store/{id}/{ida}','store_acceptance');
    Route::get('Patient_Aid/{id}','Patient_Aid');
    Route::Post('Patient_Aid/Patient_Aid_store/{id}','Patient_Aid_store');
});


Route::controller(Medication_TimeController::class)->group(function () {

    Route::Post('Medication_Time/store/{id}','store');
    Route::get('Medication_Time/show/{id}','show');
    Route::get('Medication_Time/status/{id}','status');

});


Route::controller(Healthy_ValueController::class)->group(function () {

    Route::Post('Healthy_Value/store_value/{id}/{idd}','store_value');
    Route::get('Healthy_Value/show_value/{id}/{idd}','show_value');
    Route::get('Healthy_Value/delete_value/{id}','delete_value');
    
});

Route::controller(DoctorController::class)->group(function () {

    Route::get('Doctors_Directory/index','index');
    Route::get('Doctors_Directory/search','search');
    
});

Route::controller(Awareness_PostController::class)->group(function () {

    Route::get('post','post');
    Route::get('post/Doctor_s_post/{id}','Doctor_s_post');
    Route::get('post/deleted_post/{id}','deleted_post');
    Route::post('post/store_post/{id}','store_post');
    Route::post('post/edit_post/{id}','edit_post');
    Route::get('post/destroy/{id}','destroy');
    Route::get('post/restore/{id}','restore');
    Route::get('post/forcedelete/{id}','forcedelete');
    
});


Route::get('/csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});

Route::get('/test-session', function () {
    session(['key' => 'value']);
    return session('key');
});
