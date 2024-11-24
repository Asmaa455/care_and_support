<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Medical_ConsultationController;
use App\Http\Controllers\PatientaidsController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\VolController;
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

Route::Post('Medical_Consultation/patient_consultation_store/{id}',
[Medical_ConsultationController::class,'store_Medical_Consultation'])
->name('Medical_Consultation.store_Medical_Consultation');




//////////////////////******************************* ***////////////

/*Route::resource('patient__aids', PatientaidsController::class);

Route::get('Patient_Aids/patient_aids_indx/{id}',
 [PatientaidsController::class, 'index_Patient_Aids'])->name('patient__aids.index');
Route::post('Patient_Aids/patient_aids_create/{id}',
 [PatientaidsController::class, 'create_Patient_Aids'])->name('patient__aids.create');
Route::post('Patient_Aids/patient_aids_store/{id}',
 [PatientaidsController::class, 'store_Patient_Aids'])->name('patient__aids.store');*/


 ///////////////////********************************///////////////// */
 
/* Route::get('Volunteer/volunteer_index/{id}', [VolunteerController::class, 'index_Volunteer'])->name('volunteer.index');
 Route::post('Volunteer/volunteer/respond/{id}', [VolunteerController::class, 'respond_Volunteer'])->name('volunteer.respond');*/






 /*Route::get('vold',[VolController::class, 'index']);*/