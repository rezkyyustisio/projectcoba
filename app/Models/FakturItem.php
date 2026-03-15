<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FakturItem extends Model
{
    use HasFactory;

    protected $table = 'faktur_items';

    protected $fillable = [
        'faktur_id',
        'nama_item',
        'jumlah',
        'nominal'
    ];

    protected $casts = [
        'jumlah' => 'integer',
        'nominal' => 'integer'
    ];

    public function faktur()
    {
        return $this->belongsTo(Faktur::class, 'faktur_id');
    }

    // Accessor untuk subtotal
    public function getSubtotalAttribute()
    {
        return $this->jumlah * $this->nominal;
    }

    // Accessor untuk format subtotal
    public function getSubtotalFormatAttribute()
    {
        return 'Rp ' . number_format($this->subtotal, 0, ',', '.');
    }
}