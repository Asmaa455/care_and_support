<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientaidsController;
use App\Http\Controllers\VolunteerController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

// Patient Aids

Route::get('aids /{id}', [PatientaidsController::class, 'getPatientAids']);
Route::post('aids', [PatientaidsController::class, 'addPatientAid']);

//volunteer 

Route::get('volunteerTOaid',[VolunteerController::class, 'getRequest']);
Route::post('volunteer',[VolunteerController::class, 'respond']);





//Route::get('vold',[VolController::class, 'index']);