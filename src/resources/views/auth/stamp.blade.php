@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/stamp.css') }}">
@endsection
@section('nav')
    <div class="header__content">
        <nav class="header-nav">
            <ul class="header-nav__list">
                <li class="nav__item"><a class="nav-link__home" href="/stamp">ホーム</a></li>
                <li class="nav__item"><a class="nav-link__date" href="/date">日付一覧</a></li>
                <li class="nav__item">
                    <form class="nav-link__logout" action="/logout" method="post">
                    @csrf
                        <button class="nav-link__button">ログアウト
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
@endsection
@section('content')
    <div class="stamp__content">
        <div class="stamp__content-inner">
            <div class="top-message"><p class="message-text">{{ Auth::user()->name }}さんお疲れ様です！</p></div>
                <div class="stamp__works">
                    <form class="stamps__work" action="/work-start" method="post">
                    @csrf
                        <button class="stamp__work-start" name="work-start">勤務開始</button>
                    </form>
                    <form class="stamps__work" action="/work-finish" method="post">
                    @csrf
                        <button class="stamp__work-finish">勤務終了</button>
                    </form>
                </div>
                <div class="stamp__rests">
                    <form class="stamps__rest">
                    @csrf
                        <button class="stamp__rest-start">休憩開始</button>
                    </form>
                    <form class="stamps__rest">
                        <button class="stamp__rest-end">休憩終了</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection