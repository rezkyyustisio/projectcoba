<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlurKeuangan extends Model
{
    use HasFactory;

    protected $table = 'alur_keuangan';

    protected $fillable = [
        'nama_kegiatan',
        'status',
        'nominal',
        'tanggal_transaksi',
        'deskripsi',
        'file',
        'status_pembayaran'
    ];

    protected $casts = [
        'tanggal_transaksi' => 'date:Y-m-d',
        'nominal' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // Accessor untuk format nominal
    public function getNominalFormatAttribute()
    {
        return 'Rp ' . number_format($this->nominal, 0, ',', '.');
    }

    // Scope untuk filter status
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Scope untuk filter status pembayaran
    public function scopeStatusPembayaran($query, $status)
    {
        return $query->where('status_pembayaran', $status);
    }

    // Scope untuk range tanggal
    public function scopeTanggalRange($query, $start, $end)
    {
        return $query->whereBetween('tanggal_transaksi', [$start, $end]);
    }
}