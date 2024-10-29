<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Auth;

class FavoriteController extends Controller
{
    public function toggle(Shop $shop)
    {
    // ユーザーがログインしているかチェック
    if (!Auth::check()) {
        return redirect()->route('login'); // または適切なリダイレクト先
    }

    $user = Auth::user();

    // お気に入りに登録済みか確認
    if ($user->favorites()->where('shop_id', $shop->id)->exists()) {
        // 登録済みなら削除
        $user->favorites()->detach($shop->id);
    } else {
        // 未登録なら追加
        $user->favorites()->attach($shop->id);
    }

    // ページをリロード
    return redirect()->back();
    }

}
