<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'santri_id',
        'payment_type_id',
        'tagihan',
        'terbayar',
        'belum_dibayar',
        'status'
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class);
    }
}
