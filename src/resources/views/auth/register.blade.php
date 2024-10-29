@extends('layouts.app')

@section('title')
<title>Rese-Registration</title>

@section('css')
<link rel="stylesheet" href="{{asset('css/register.css')}}">

@section('content')
<div class="register-container">
    <h2 class="main-ttl">Registration</h2>

    <form action="/register" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">
                <img src="{{asset('Username_icon.png')}}" alt="Username">
            </label>
            <input type="text" placeholder="Username" id="name" name="name" value="{{ old('username') }}">
        </div>

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
            <button type="submit" class="btn">登録</button>
        </div>
    </form>
</div>
@endsection