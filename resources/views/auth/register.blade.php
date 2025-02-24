@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endpush

@section('content')
    <div class="container" style="max-width: 1000px; padding: 60px; display: flex; justify-content: center; align-items: center; height: 100vh;">
        <form method="POST" action="{{ route('register') }}" class="register-form" style="font-size: 1.5rem; padding: 60px; width: 700px;">
            @csrf

            <h2 class="form-title" style="font-size: 3rem; text-align: center;">アカウント登録</h2>

            <!-- Name -->
            <div class="input-group" style="margin-bottom: 35px;">
                <label for="name" class="input-label">名前</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    autocomplete="name" class="input-field" style="height: 70px; font-size: 1.6rem;">
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="input-group mt-4" style="margin-bottom: 35px;">
                <label for="email" class="input-label">メールアドレス</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    autocomplete="username" class="input-field" style="height: 70px; font-size: 1.6rem;">
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="input-group mt-4" style="margin-bottom: 35px;">
                <label for="password" class="input-label">パスワード</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="input-field" style="height: 70px; font-size: 1.6rem;">
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="input-group mt-4" style="margin-bottom: 35px;">
                <label for="password_confirmation" class="input-label">パスワード確認</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    autocomplete="new-password" class="input-field" style="height: 70px; font-size: 1.6rem;">
                @error('password_confirmation')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="primary-button" style="height: 80px; font-size: 2rem; width: 100%;">アカウントを作成</button>
        </form>
    </div>
@endsection
