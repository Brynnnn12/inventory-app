<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ItemIn extends Model
{
    //
    use HasFactory;

    protected $table = 'item_ins';

    protected $fillable = [

        'item_id',
        'quantity',
        'date_in',
    ];


    protected static function booted()
    {
        static::creating(function ($itemIn) {
            // Mengatur user_id berdasarkan pengguna yang sedang login
            $itemIn->user_id = Auth::id();
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
