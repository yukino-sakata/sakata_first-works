@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/date.css') }}">
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
    <div class="content">
        <div class="content__inner">
            <div class="date-select">XXXX-XX-XX</div>
            <table class="date-table">
                <tr class="table-row">
                    <th class="table-header__item">名前</th>
                    <th class="table-header__item">勤務開始</th>
                    <th class="table-header__item">勤務終了</th>
                    <th class="table-header__item">休憩時間</th>
                    <th class="table-header__item">勤務時間</th>
                </tr>
                @foreach ($users as $user)
                <tr class="table-row">
                    <td class="table-date__item">{{$user->name}}</td>
                    <td class="table-date__item">///</td>
                    <td class="table-date__item">///</td>
                    <td class="table-date__item">///</td>
                    <td class="table-date__item">///</td>
                </tr>
                @endforeach
            </table>
            <div class="pagination">
            {{ $users->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
@endsection

