@extends('layouts.app')

@section('title')
<title>Rese-Thanks</title>

@section('css')
<link rel="stylesheet" href="{{asset('css/thanks.css')}}">

@section('content')
<div class="thanks-container">
    <h2 class="thanks-message">会員登録ありがとうございます</h2>
    <a href="/login" class="login-btn">ログインする</a>
</div>
@endsection