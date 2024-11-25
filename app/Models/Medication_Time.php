<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Medication_Time extends Model
{

    protected $fillable = ['patient_id', 'medication_name', 'amount' , 'time_of_taking_the_drug' , 'daily_repetition', 'start_date' , 'duration_of_taking_the_drug','status'];

    protected $guarded=[];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
