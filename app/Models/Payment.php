<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'sale_id',
        'amount',
        'payment_type',
        'date',
    ];
    protected $casts = [
        'amount' => 'decimal:2',
        'date' => 'datetime'
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
