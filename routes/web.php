<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Medical_ConsultationController;

Route::get('/', function () {
    return view('welcome');
});

