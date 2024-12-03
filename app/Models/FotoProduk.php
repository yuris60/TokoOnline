<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FotoProduk extends Model
{
    public $timestamps = true;
    protected $table = 'foto_produk';
    protected $guarded = ['id'];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
