@extends('layouts.app')

@section('title', 'ログイン')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

<!-- ✅ ナビゲーションを非表示にする -->
@section('nav')

@section('content')
    <div class="login-container">
        <h1 class="login-title">退職代行<br>モーアカン® <br>ログイン</h1>

        <!-- ✅ 「本人に伝達したいことが送信できます」と表示 -->
        <p class="login-description">本人に伝達したいことが送信できます。</p>

        <form action="{{ route('login') }}" method="POST" class="login-form">
            @csrf

            <input type="email" name="email" placeholder="メールアドレス" required>
            <input type="password" name="password" placeholder="パスワード" required>

            <button type="submit" class="login-button">ログイン</button>
        </form>

        <!-- ✅ パスワードリセットのみ表示し、新規登録リンクを削除 -->
        <div class="login-links">
            <a href="{{ route('password.request') }}">パスワードをお忘れですか？</a>
        </div>
    </div>
@endsection
