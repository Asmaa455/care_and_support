<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class Patient extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function patient__aids(): HasMany
    {
        return $this->hasMany(Patient_Aid::class);
    }

    public function medical__consultations(): HasMany
    {
        return $this->hasMany(Medical_Consultation::class);
    }

    public function medication__times(): HasMany
    {
        return $this->hasMany(Medication_Time::class);
    }

    public function diseases(): BelongsToMany
    {
        return $this->belongsToMany(Disease::class);
    }
}