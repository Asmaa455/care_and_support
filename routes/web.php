<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Medical_ConsultationController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('Medical_Consultation',Medical_ConsultationController::class);

Route::get('Medical_Consultation/patient_consultation/{id}',
[Medical_ConsultationController::class,'patient_consultation'])
->name('view');

Route::get('Medical_Consultation/patient_consultation_create/{id}',
[Medical_ConsultationController::class,'create_Medical_Consultation'])
->name('Medical_Consultation.create_Medical_Consultation');

Route::Post('Medical_Consultation/patient_consultation_store/{id}}',
[Medical_ConsultationController::class,'store_Medical_Consultation'])
->name('Medical_Consultation.store_Medical_Consultation');