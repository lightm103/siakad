<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\Payment;
use App\Models\PaymentType;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    public function store(Request $request)
    {
        $paymentType = PaymentType::create([
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah
        ]);

        // Setelah menambahkan jenis pembayaran, kita tambahkan ke semua santri
        $santris = Santri::all();
        foreach ($santris as $santri) {
            Payment::create([
                'santri_id' => $santri->id,
                'payment_type_id' => $paymentType->id,
                'tagihan' => $paymentType->jumlah,
                'terbayar' => 0,
                'belum_dibayar' => $paymentType->jumlah,
                'status' => 'belum lunas'
            ]);
        }

        return redirect()->back()->with('success', 'Jenis pembayaran berhasil ditambahkan ke semua santri.');
    }
}
