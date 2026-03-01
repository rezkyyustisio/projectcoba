<?php

namespace App\Models\Berita;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BeritaCategory extends Model
{
    use Loggable;

    protected $fillable  = ['name','slug'];
    
    protected $keyType   = 'string';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function beritas(){
        return $this->hasMany(Berita::class,'category_id')->orderBy('created_at','desc');
    }
}