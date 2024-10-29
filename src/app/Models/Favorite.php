<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_id',
    ];

    // お気に入りに関連するユーザー
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // お気に入りに関連する飲食店
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
