<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Awareness_Post extends Model
{

    protected $fillable = ['doctor_id', 'title','content','category'];
    protected $guarded=[];
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
}
