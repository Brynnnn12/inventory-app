<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ItemOut extends Model
{
    //
    use HasFactory;

    protected $table = 'item_outs';

    protected $fillable = [
        'item_id',
        'quantity',
        'date_out',
    ];

    protected static function booted()
    {
        // Mengatur user_id secara otomatis saat creating
        static::creating(function ($itemOut) {
            $itemOut->user_id = Auth::id();  // user_id otomatis berdasarkan user yang login
        });
    }

    public function item()
    {
        return $this->belongsTo(Items::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
