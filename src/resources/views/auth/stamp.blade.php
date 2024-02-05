@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/stamp.css') }}">
@endsection
@section('nav')
    <div class="header__content">
        <nav class="header-nav">
            <ul class="header-nav__list">
                <li class="nav__item"><a class="nav-link__home" href="/stamp?={{$date}}">ホーム</a></li>
                <li class="nav__item"><a class="nav-link__date" href="/date?={{$date}}">日付一覧</a></li>
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
            <div class="top-message">
                <div class="message-text">
                {{ Auth::user()->name }}さんお疲れ様です！
                @if(session('message'))
                    <span class="stamp-message">
                        <br>{{ session('message') }}
                    </span>
                @endif
                @if(count($work)>0 && count($openWork)===0)
                    <span class="stamp-message">
                        <br>本日の勤務は終了しました<br>
                    </span>
                </div>
                @endif
            </div>
            <div class="stamp__works">
                <form class="stamps__work" action="/work-start" method="post">
                @csrf
                    @if(count($work)>0)
                        <button class="stamp__work-start" name="work-start" disabled>勤務開始</button>
                    @elseif(count($openWork)===0)
                        <button class="stamp__work-start" name="work-start">勤務開始</button>
                    @else
                        <button class="stamp__work-start" name="work-start">勤務開始</button>
                    @endif
                </form>
                <form class="stamps__work" action="/work-finish" method="post">
                @csrf
                    @if(count($openWork)===0)
                    <button class="stamp__work-finish" disabled>勤務終了</button>
                    @elseif(count($rest)>0)
                    <button class="stamp__work-finish" disabled>勤務終了</button>
                    @else
                    <button class="stamp__work-finish">勤務終了</button>
                    @endif
                </form>
            </div>
            <div class="stamp__rests">
                <form class="stamps__rest" action="/rest-start" method="post">
                @csrf
                    @if(count($openWork)===0)
                    <button class="stamp__rest-start" disabled>休憩開始</button>
                    @elseif(count($rest)>0)
                    <button class="stamp__rest-start" disabled>休憩開始</button>
                    @else
                    <button class="stamp__rest-start">休憩開始</button>
                    @endif
                </form>
                <form class="stamps__rest" action="/rest-end" method="post">
                @csrf
                    @if(count($openWork)===0)
                    <button class="stamp__rest-end" disabled>休憩終了</button>
                    @elseif(count($rest)===0)
                    <button class="stamp__rest-end" disabled>休憩終了</button>
                    @else
                    <button class="stamp__rest-end">休憩終了</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection