<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Doctor extends Model
{
    protected $fillable = ['name', 'specialization','clinic_location','user_id', 'certificate_photo','contact_information','image'];
    protected $guarded=[];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function awareness__posts(): HasMany
    {
        return $this->hasMany(Awareness_Post::class);
    }

    public function medical__consultations(): HasMany
    {
        return $this->hasMany(Medical_Consultation::class);
    }

}
