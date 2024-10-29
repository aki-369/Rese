<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    // 飲食店一覧ページ
    public function index() {
        $shops = Shop::with('area', 'genre')->get();
        $areas = Area::all();
        $genres = Genre::all();

        foreach ($shops as $shop) {
        // 現在のユーザーがログインしているかチェック
        if (Auth::check()) {
            // 現在のユーザーがそのショップをお気に入りにしているかチェック
            $shop->isFavorited = Auth::user()->favorites()->where('shop_id', $shop->id)->exists();
        } else {
            // ユーザーがログインしていない場合は、isFavoritedをfalseに設定
            $shop->isFavorited = false;
        }
        }
        return view('shops.index', compact('shops', 'areas', 'genres'));
    }

    // 飲食店詳細ページ
    public function showDetailForm($id) {
        $shop = Shop::findOrFail($id);
        return view('shops.detail', compact('shop'));
    }

    public function search(Request $request)
    {
        $areaId = $request->input('area');
        $genreId = $request->input('genre');
        $keyword = $request->input('keyword');

        $query = Shop::with('area', 'genre');

        if ($areaId) {
            $query->where('area_id', $areaId);
        }

        if ($genreId) {
            $query->where('genre_id', $genreId);
        }

        if ($keyword) {
            $query->where('name', 'LIKE', "%$keyword%");
        }

        $shops = $query->get();
        $areas = Area::all();
        $genres = Genre::all();

        return view('shops.index', compact('shops', 'areas', 'genres'));
    }
}