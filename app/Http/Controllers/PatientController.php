<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function patient_data(Request $request)
    {
        $user_id=Auth::user()->id;
        $paper_path = $request->file('paper_to_prove_cancer')->store('paper_to_prove_cancer', 'public');
        $image_path = $request->file('image')->store('patient', 'public');
        $patient = Patient::create([
            'user_id' => $user_id,
            'age' => $request->age,
            'gender' => $request->gender,
            'diseases' => $request->diseases,
            'paper_to_prove_cancer' => $paper_path,
            'image' => $image_path,
        ]);
        $wallet = Wallet::create([
            'user_id' => $user_id,
            'current_balance' => 10,
        ]);
        return response()->json([
            'message' => 'patient data created successfully',
            'patient' => $patient,
            'wallet' => $wallet
        ]);
    }
}
