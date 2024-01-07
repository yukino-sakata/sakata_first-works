@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('nav')
@endsection
@section('content')
    <div class="content__login">
        <p class="login__header">ログイン</p>
        <form class="login__form" action="/login" method="post">
        @csrf
       <div class="form__error">
        @error('email')
        {{ $message }}
        @enderror
        @error('password')
        {{ $message }}
        @enderror
        </div>
            <div class="login-item">
                <input class="login-item__email" type="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}">
            </div>
            <div class="login-item">
                <input class="login-item__pass" type="password" name="password" placeholder="パスワード">
            </div>
            <div class="login-item">
                <button class="login-button" type="submit">ログイン</button>
            </div>
        </form>
        <div class="content__link">
            <p class="link-text">アカウントをお持ちでない方はこちら</p>
            <span><a class="link-register" href="/register">会員登録</a></span>
        </div>
    </div>

@endsection