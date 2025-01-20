<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Medication_Time extends Model
{

    protected $fillable = ['patient_id', 'medication_name', 'amount' ,
        'start_date' , 'times_per_day', 'first_dose_time' , 'duration_days'];

    protected $guarded=[];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function reminder__times(): HasMany
    {
        return $this->hasMany(Reminder_Time::class);
    }
}
