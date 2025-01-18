<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Medical_ConsultationController;
use App\Http\Controllers\Patient_AidController;
use App\Http\Controllers\Medication_TimeController;
use App\Http\Controllers\Healthy_ValueController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\Awareness_PostController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VolunteerController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(UserController::class)->group(function () {
//->middleware('verified')
    Route::Post('register','register');
    Route::Post('login','login');
    Route::get('logout','logout')->middleware('auth:sanctum');

});

Route::controller(VolunteerController::class)->group(function () {

    Route::Post('volunteer_data','volunteer_data')->middleware('auth:sanctum');
});

Route::controller(PatientController::class)->group(function () {

    Route::Post('patient_data','patient_data')->middleware('auth:sanctum');
});

Route::controller(Medical_ConsultationController::class)->group(function () {

    Route::get('Medical_Consultation/Answered_Medical_Consultation','Answered_Medical_Consultation');
    Route::get('Medical_Consultation/Unanswered_Medical_Consultations','Unanswered_Medical_Consultations');
    Route::get('Medical_Consultation/Doctor_s_Answers','Doctor_s_Answers')
    ->middleware('auth:sanctum');
    Route::Post('Medical_Consultation/doctor_answer_create/store/{id}','store_answer')
    ->middleware('auth:sanctum');
    Route::get('Medical_Consultation/patient_consultation','patient_consultation')
    ->middleware('auth:sanctum');   
    Route::Post('Medical_Consultation/patient_consultation_store','store_Medical_Consultation')
    ->middleware('auth:sanctum');
});


Route::controller(Patient_AidController::class)->group(function () {

    Route::get('Patient_Aid/Acceptable_Patient_Aid','Acceptable_Patient_Aid');
    Route::get('Patient_Aid/Unacceptable_Patient_Aid','Unacceptable_Patient_Aid');
    Route::get('Patient_Aid/Volunteer_Acceptance','Volunteer_Acceptance')
    ->middleware('auth:sanctum');
    Route::get('Patient_Aid/Volunteer_acceptance_create/store/{id}','store_acceptance')
    ->middleware('auth:sanctum');
    Route::get('Patient_Aid','Patient_Aid')
    ->middleware('auth:sanctum');
    Route::Post('Patient_Aid/Patient_Aid_store','Patient_Aid_store')
    ->middleware('auth:sanctum');
});


Route::controller(Medication_TimeController::class)->group(function () {

    Route::Post('Medication_Time/store/{id}','store');
    Route::get('Medication_Time/show/{id}','show');
    Route::get('Medication_Time/status/{id}','status');

});


Route::controller(Healthy_ValueController::class)->group(function () {

    Route::Post('Healthy_Value/store_value/{id}','store_value')
    ->middleware('auth:sanctum');
    Route::get('Healthy_Value/show_value/{id}','show_value')
    ->middleware('auth:sanctum');
    Route::get('Healthy_Value/delete_value/{id}','delete_value');
    
});

Route::controller(DoctorController::class)->group(function () {

    Route::get('Doctors_Directory/index','index');
    Route::get('Doctors_Directory/search','search');

    Route::Post('doctor_data','doctor_data')
    ->middleware('auth:sanctum');
});

Route::controller(Awareness_PostController::class)->group(function () {

    Route::get('post','post');
    Route::get('post/Doctor_s_post','Doctor_s_post')
    ->middleware('auth:sanctum');
    Route::get('post/deleted_post','deleted_post')
    ->middleware('auth:sanctum');
    Route::post('post/store_post','store_post')
    ->middleware('auth:sanctum');
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
