@extends('layouts.app')

@section('title')
<title>Rese-Done</title>

@section('css')
<link rel="stylesheet" href="{{asset('css/done.css')}}">

@section('content')
<div class="done-container">
    <h2 class="done-message">ご予約ありがとうございます</h2>
    <a href="/" class="home-btn">戻る</a>
</div>
@endsection