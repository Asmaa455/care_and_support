<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reminder_Time extends Model
{

    protected $fillable = ['medication__time_id', 'date', 'time' ,'status'];

protected $guarded=[];
    public function medication__times(): BelongsTo
    {
        return $this->belongsTo(Medication_Time::class);
    }
}
