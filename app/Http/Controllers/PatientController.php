<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function patient_data(Request $request,$id)
    {

      /*  $request->validate([
            'paper_to_prove_cancer' => 'nullable|string',
        ]);*/
        $paper_path = $request->file('paper_to_prove_cancer') ? $request->file('paper_to_prove_cancer')->store('paper_to_prove_cancer', 'public') : null;
        $image_path = $request->file('image') ? $request->file('image')->store('patient', 'public') : null;
        $patient = Patient::create([
            'user_id' => $id,
            'age' => $request->age,
            'gender' => $request->gender,
            'diseases' => $request->diseases,
            'paper_to_prove_cancer' => $paper_path,
            'image' => $image_path,
        ]);
        $wallet = Wallet::create([
            'user_id' => $id,
            'current_balance' => 10,
        ]);
        return response()->json([
            'message' => 'patient data created successfully',
            'patient' => $patient,
            'wallet' => $wallet
        ]);
    }

    public function view_patient_data()
    {
        // الحصول على بيانات المريض للبروفايل
        $user_id=Auth::user()->id;
        $patient=Patient::where('user_id',$user_id)->with('user')->get();
        $wallet = Wallet::where('user_id',$user_id)->get();
        return response()->json([
            'patient' => $patient,
            'wallet' => $wallet,
        ]);

    }

    public function update_patient_data(Request $request)
    {
        $user_id=Auth::user()->id;
        $patient = Patient::where('user_id', $user_id)->firstOrFail();
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('patient', 'public');
            $patient->image = $image_path;
        }
        if ($request->hasFile('paper_to_prove_cancer')) {
            $paper_path = $request->file('paper_to_prove_cancer')->store('paper_to_prove_cancer', 'public');
            $patient->paper_to_prove_cancer = $paper_path;
        }
        $patient->update($request->only(['age', 'gender', 'diseases']));

        $user = User::findOrFail($user_id);
        $user_data = $request->only(['first_name', 'second_name']);
        $user->update($user_data);

        return response()->json([
            'message' => 'Patient data updated successfully',
            'patient' => $patient,
            'user' => $user,
        ]);
        
    }
}
