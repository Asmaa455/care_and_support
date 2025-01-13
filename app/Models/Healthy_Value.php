<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Healthy_Value extends Model
{

    protected $fillable = ['patient_id', 'disease_id','value','value2'];
    protected $guarded=[];
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function diseases(): BelongsTo
    {
        return $this->belongsTo(Disease::class);
    }
}
