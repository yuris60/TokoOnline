<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    public $timestamps = true;
    protected $table = 'produk';
    protected $guarded = ['id'];

    protected $fillable = [
        'kategori_id',
        'user_id',
        'status',
        'nama_produk',
        'detail',
        'harga',
        'stok',
        'berat',
        'foto',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fotoProduk()
    {
        return $this->hasMany(FotoProduk::class);
    }
}
