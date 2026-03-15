<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HutangPiutang extends Model
{
    use HasFactory;

    protected $table = 'hutang_piutang';

    protected $fillable = [
        'type',
        'nama',
        'jumlah',
        'tanggal',
        'tanggal_jatuh_tempo',
        'deskripsi',
        'status'
    ];

    protected $casts = [
        'tanggal' => 'date:Y-m-d',
        'tanggal_jatuh_tempo' => 'date:Y-m-d',
        'jumlah' => 'integer'
    ];

    // Accessor untuk format jumlah
    public function getJumlahFormatAttribute()
    {
        return 'Rp ' . number_format($this->jumlah, 0, ',', '.');
    }

    // Scope untuk filter type
    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

    // Scope untuk filter status
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Scope untuk hutang saja
    public function scopeHutang($query)
    {
        return $query->where('type', 'hutang');
    }

    // Scope untuk piutang saja
    public function scopePiutang($query)
    {
        return $query->where('type', 'piutang');
    }

    // Scope untuk yang belum lunas
    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }

    // Scope untuk yang sudah lunas
    public function scopeLunas($query)
    {
        return $query->where('status', 'lunas');
    }
}