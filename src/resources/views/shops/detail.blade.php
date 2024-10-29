@extends('layouts.app')

@section('title')
<title>Rese-Detail</title>

@section('css')
<link rel="stylesheet" href="{{asset('css/detail.css')}}">

@section('content')
<div class="detail-container">
    <div class="detail-group">
        <h2 class="shop-title">{{ $shop->name }}</h2>
        <img src="{{ $shop->image_url }}" class="shop-img-top" alt="{{ $shop->name }}">
        <div class="area-genre-container">
            <p class="shop-text">#{{ $shop->area->name }}</p>
            <p class="shop-text">#{{ $shop->genre->name }}</p>
        </div>
        <p class="shop-text description">#{{ $shop->description }}</p>
    </div>

    <div class="reservation-group">
        <h2 class="reservation-ttl">予約</h2>
        @if(session('confirmation'))
            <div class="reservation-summary">
                <p><span class="label">Shop</span><span class="value">{{ $shop->name }}</span></p>
                <p><span class="label">Date</span><span class="value">{{ session('confirmation')['date'] }}</span></p>
                <p><span class="label">Time</span><span class="value">{{ session('confirmation')['time'] }}</span></p>
                <p><span class="label">Number</span><span class="value">{{ session('confirmation')['number_of_people'] }}人</span></p>
            </div>
            <form method="POST" action="{{ route('shops.reservation.add', ['shop_id' => $shop->id]) }}">
                @csrf
                <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                <input type="hidden" name="date" value="{{ session('confirmation')['date'] }}">
                <input type="hidden" name="time" value="{{ session('confirmation')['time'] }}">
                <input type="hidden" name="number_of_people" value="{{ session('confirmation')['number_of_people'] }}">
                <button type="submit" class="btn">予約確定</button>
            </form>
        @else
            {{-- 通常の予約フォーム --}}
            <form method="POST" action="{{ route('shops.reservation.confirm', ['shop_id' => $shop->id]) }}">
                @csrf
                <input type="hidden" name="shop_id" value="{{ $shop->id }}">
            
                <div class="reservation-item">
                    <input type="date" id="date" name="date" class="item-date" required>
                </div>
                <div class="reservation-item">
                    <input type="time" id="time" name="time" class="item-time" required>
                </div>
                <div class="reservation-item">
                    <input type="number" id="number_of_people" name="number_of_people" min="1" class="item-number" placeholder="予約人数" required>
                </div>
            
                <button type="submit" class="btn">予約する</button>
            </form>
        @endif
    </div>
</div>
@endsection