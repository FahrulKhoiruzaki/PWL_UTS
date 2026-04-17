<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barang extends Model
{
    protected $table = 'barangs';
    protected $primaryKey = 'barang_id';

    protected $fillable = [
        'kategori_id',
        'barang_kode',
        'barang_nama',
        'harga_beli',
        'harga_jual',
    ];

    protected $casts = [
        'harga_beli' => 'integer',
        'harga_jual' => 'integer',
    ];

    public function kategori(): BelongsTo{
        return $this->belongsTo(Kategori::class, 'kategori_id', 'kategori_id');
    }

    public function stokc(): HasMany{
        return $this->hasMany(Stok::class, 'barang_id', 'barang_id');
    }

    public function penjualanDetails(): HasMany{
        return $this->hasMany(PenjualanDetail::class, 'barang_id', 'barang_id');
    }
}
