<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    //
    use HasFactory;

    protected $table = 'items';

    protected $guarded = [
        'id'
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Suppliers::class);
    }
    // Relasi Barang dengan ItemIn (Barang Masuk)
    public function itemIns()
    {
        return $this->hasMany(ItemIn::class);
    }

    // Relasi Barang dengan ItemOut (Barang Keluar)
    public function itemOuts()
    {
        return $this->hasMany(ItemOut::class);
    }
}
