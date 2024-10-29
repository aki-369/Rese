<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_id',
        'genre_id',
        'name',
        'description',
        'image_url',
    ];

    //　エリア情報
    public function area() {
        return $this->belongsTo(Area::class);
    }

    //　ジャンル情報
    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    // お気に入り情報
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    // 予約情報
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

}
