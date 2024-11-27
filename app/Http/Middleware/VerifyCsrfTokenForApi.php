<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyCsrfTokenForApi
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->isMethod('post') || $request->isMethod('put') || $request->isMethod('delete')) {
            $token = $request->header('X-CSRF-TOKEN');
            if ($token !== csrf_token()) {
                return response()->json(['message' => 'Invalid CSRF token'], 419);
            }
        }

        return $next($request);
    }

    protected $except = [
        'api/Medical_Consultation/patient_consultation_store/{id}'
    ];
}
