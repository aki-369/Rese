@extends('layouts.app')


@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">

@section('content')
<div class="search-bar">
    <form action="{{ route('shops.search') }}" method="GET">
        <select name="area" class="form-select">
            <option value="">エリアを選択</option>
                @foreach ($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                @endforeach
        </select>

        <select name="genre" class="form-select">
            <option value="">ジャンルを選択</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
        </select>

        <input type="text" name="keyword" class="form-control" placeholder="Search" />

        <button type="submit" class="search-btn">検索</button>
    </form>
</div>

<div class="container">
    <div class="shop-container">
        @foreach ($shops as $shop)
        @csrf
        <div class="shop-card">
            <img src="{{ $shop->image_url }}" class="card-img-top" alt="{{ $shop->name }}">
            <div class="card-body">
                <h2 class="card-title">{{ $shop->name }}</h2>
                <p class="card-text">#{{ $shop->area->name }}</p>
                <p class="card-text">#{{ $shop->genre->name }}</p>
                
                <div class="button-container">
                    <a href="{{ route('shops.detail', $shop->id) }}" class="btn">詳しくみる</a>

                    <form action="{{ route('favorites.toggle', $shop->id) }}" method="POST">
                    @csrf
                        <button type="submit" class="favorite-btn">
                            @if($shop->isFavorited)
                                <img src="{{ asset('favorites_blue_icon.png') }}" alt="お気に入り">
                            @else
                                <img src="{{ asset('favorites_white_icon.png') }}" alt="お気に入りではない">
                            @endif
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection