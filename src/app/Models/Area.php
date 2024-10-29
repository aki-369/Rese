<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'name',
    ];

    // エリアに関連する飲食店
    public function shop()
    {
        return $this->hasMany(Shop::class);
    }
}
