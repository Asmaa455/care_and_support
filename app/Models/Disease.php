<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Disease extends Model
{
    public function healthy__values(): HasMany
    {
        return $this->hasMany(Healthy_Value::class);
    }
}
