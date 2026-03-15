<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faktur extends Model
{
    use HasFactory;

    protected $table = 'faktur';

    protected $fillable = [
        'nomor_faktur',
        'judul',
        'tanggal',
        'tanggal_jatuh_tempo',
        'tipe_pembayaran',
        'nama_perusahaan',
        'logo_perusahaan',
        'alamat_perusahaan',
        'penerima_faktur',
        'alamat_penerima'
    ];

    protected $casts = [
        'tanggal' => 'date:Y-m-d',
        'tanggal_jatuh_tempo' => 'date:Y-m-d'
    ];

    public function items()
    {
        return $this->hasMany(FakturItem::class, 'faktur_id');
    }

    // Accessor untuk total faktur
    public function getTotalAttribute()
    {
        return $this->items->sum(function ($item) {
            return $item->jumlah * $item->nominal;
        });
    }

    // Accessor untuk format total
    public function getTotalFormatAttribute()
    {
        return 'Rp ' . number_format($this->total, 0, ',', '.');
    }
}