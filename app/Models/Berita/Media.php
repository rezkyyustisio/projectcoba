<?php

namespace App\Models\Berita;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = [
        'deskripsi',
        'file',
    ];
}
