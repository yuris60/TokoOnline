<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FotoProduk extends Model
{
    public $timestamps = true;
    protected $table = 'foto_produk';
    protected $guarded = ['id'];
    protected $fillable = [
        'produk_id',
        'foto'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
