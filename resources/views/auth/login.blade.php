@extends('layouts.app')

@section('title', 'ログイン')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

<!-- ✅ ナビゲーションを非表示にする -->
@section('nav')

@section('content')
    <div class="login-container">
        <h1 class="login-title">退職代行モーアカン® ログイン</h1>

        <form action="{{ route('login') }}" method="POST" class="login-form">
            @csrf

            <input type="email" name="email" placeholder="メールアドレス" required>
            <input type="password" name="password" placeholder="パスワード" required>

            <button type="submit" class="login-button">ログイン</button>
        </form>

        <div class="login-links">
            <a href="{{ route('password.request') }}">パスワードをお忘れですか？</a> |
            <a href="{{ route('register') }}">新規登録</a>
        </div>
    </div>
@endsection
