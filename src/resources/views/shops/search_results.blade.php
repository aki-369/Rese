@extends('layouts.app')

@section('content')
    <h1>検索結果</h1>
    <ul>
        @foreach($restaurants as $restaurant)
            <li><a href="{{ route('shops.show', $restaurant->id) }}">{{ $restaurant->name }}</a></li>
        @endforeach
    </ul>
@endsection