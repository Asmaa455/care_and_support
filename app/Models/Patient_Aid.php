<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Patient_Aid extends Model
{


    protected $fillable = ['patient_id', 'aid_type', 'aid_date' , 'location' , 'additional_details', 'volunteer_id','status'];

    protected $guarded=[];
    
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function volunteer(): BelongsTo
    {
        return $this->belongsTo(Volunteer::class);
    }
}
