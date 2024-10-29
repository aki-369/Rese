@extends('layouts.app')

@section('title')
<title>Rese-Mypage</title>

@section('css')
<link rel="stylesheet" href="{{asset('css/mypage.css')}}">

@section('content')
<div class="user-name">
    <h1>{{ $user->name }}さん</h1>
</div>

<div class="mypage-container">

    <div class="reservation-group">
        <h2 class="reservtion-ttl">予約状況</h2>
        @forelse ($reservations as $index => $reservation)
            <div class="reservation-item">
            
                <form action="{{ route('reservations.delete', ['id' => $reservation->id]) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn">×</button>
                </form>

                <p>予約 {{ $index + 1 }}</p>
                <p><span class="label">Shop</span><span class="value">{{ $reservation->shop->name }}</span></p>
                <p><span class="label">Date</span><span class="value">{{  \Carbon\Carbon::parse($reservation->reservation_date)->format('Y-m-d') }}</span></p>
                <p><span class="label">Time</span><span class="value">{{  \Carbon\Carbon::parse($reservation->reservation_date)->format('H:i') }}</span></p>
                <p><span class="label">Number</span><span class="value">{{ $reservation->number_of_people }}人</span></p>
            </div>
        @empty
            <p>予約はありません。</p>
        @endforelse
    </div>

    <div class="favorite-group">
        <h2 class="favorite-ttl">お気に入り店舗</h2>
        @forelse ($favorites as $index => $favorite)
            <div class="favorite-item">
                <div class="shop-card">
                    <img src="{{ $favorite->shop->image_url }}" class="card-img-top" alt="{{ $favorite->shop->name }}">
                        <div class="card-body">
                            <h2 class="card-title">{{ $favorite->shop->name }}</h2>
                            <p class="card-text">#{{ $favorite->shop->area->name }}</p>
                            <p class="card-text">#{{ $favorite->shop->genre->name }}</p>

                            <div class="button-container">
                                <a href="{{ route('shops.detail', $favorite->shop->id) }}" class="btn">詳しくみる</a>

                                <form action="{{ route('favorites.toggle', $favorite->shop->id) }}" method="POST">
                                @csrf
                                    <button type="submit" class="favorite-btn">
                                        <img src="{{ asset('favorites_blue_icon.png') }}" alt="お気に入り解除">
                                    </button>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        @empty
            <p>お気に入り店舗はありません。</p>
        @endforelse
    </div>
</div>
@endsection