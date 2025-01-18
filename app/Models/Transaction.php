<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{

    protected $fillable = ['wallet_id','transaction_type','amount'];
    protected $guarded=[];


    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }
}
