<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wallet extends Model
{

    protected $fillable = ['user_id', 'current_balance'];
    protected $guarded=[];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
