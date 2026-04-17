<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PenjualanDetail extends Model
{
    protected $table = 'penjualan_details';
    protected $primaryKey = 'detail_id';

    protected $fillable = [
        'penjualan_id',
        'barang_id',
        'harga',
        'jumlah',
    ];

    protected $casts = [
        'harga' => 'integer',
        'jumlah' => 'integer',
    ];

    public function penjualan(): BelongsTo{
        return $this->belongsTo(Penjualan::class, 'penjualan_id', 'penjualan_id');
    }

    public function barang(): BelongsTo{
        return $this->belongsTo(Barang::class, 'barang_id', 'barang_id');
    }
}
