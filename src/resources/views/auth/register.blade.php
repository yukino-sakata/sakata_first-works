@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('nav')
@endsection
@section('content')
    <div class="content__register">
        <p class="register__header">会員登録</p>
        <form class="register__form" action="/register" method="post">
        @csrf
        <!--ERRORー-->
        <div class="form-error">
        @error('name')
          {{ $message }}
        @enderror
        @error('email')
          {{ $message }}
        @enderror
        @error('password')
          {{ $message }}
        @enderror
        </div>
        <!--ERRORー-->
            <div class="register-item">
                <input class="register-item__name" type="name" name="name" placeholder="名前" value="{{ old('name') }}">
            </div>
            <div class="register-item">
                <input class="register-item__email" type="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}" >
            </div>
            <div class="register-item">
                <input class="register-item__pass" type="password" name="password" placeholder="パスワード">
            </div>
            <div class="register-item">
                <input class="register-item__pass-confirmation" type="password" name="password_confirmation" placeholder="確認用パスワード">
            </div>
            <div class="register-item">
                <button class="register-button" type="submit">会員登録</button>
            </div>
        </form>
        <div class="content__link">
            <p class="link-text">アカウントをお持ちの方はこちら</p>
            <span><a class="link-login" href="/login">ログイン</a></span>
        </div>
    </div>

@endsection