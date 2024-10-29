@extends('layouts.app')

@section('title')
<title>Rese-Login</title>

@section('css')
<link rel="stylesheet" href="{{asset('css/login.css')}}">

@section('content')
<div class="login-container">
    <h2 class="main-ttl">Login</h2>

    <form action="/login" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">
                <img src="{{asset('Email_icon.png')}}" alt="Email">
            </label>
            <input type="email" placeholder="Email" id="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label for="password">
                <img src="{{asset('Password_icon.png')}}" alt="Password">
            </label>
            <input type="password" placeholder="Password" id="password" name="password">
        </div>

        <div class="btn-container">
            <button type="submit" class="btn">ログイン</button>
        </div>
    </form>
</div>
@endsection