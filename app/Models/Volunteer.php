<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Volunteer extends Model
{

    protected $fillable = ['user_id','national_number', 'contact_information','image'];
    protected $guarded=[];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function patient__aids(): HasMany
    {
        return $this->hasMany(Patient_Aid::class);
    }
}
