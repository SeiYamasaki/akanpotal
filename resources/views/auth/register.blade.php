@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endpush

@section('content')
    <div class="container"
        style="max-width: 700px; padding: 25px; display: flex; justify-content: center; align-items: center; height: 80vh;">
        <form method="POST" action="{{ route('register') }}" class="register-form"
            style="font-size: 1.1rem; padding: 25px; width: 500px;">
            @csrf

            <h2 class="form-title" style="font-size: 2.2rem; text-align: center;">アカウント登録</h2>

            <!-- Name -->
            <div class="input-group" style="margin-bottom: 15px;">
                <label for="name" class="input-label">名前</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    autocomplete="name" class="input-field" style="height: 45px; font-size: 1.1rem;">
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="input-group mt-4" style="margin-bottom: 15px;">
                <label for="email" class="input-label">メールアドレス</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    autocomplete="username" class="input-field" style="height: 45px; font-size: 1.1rem;">
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="input-group mt-4" style="margin-bottom: 15px;">
                <label for="password" class="input-label">パスワード</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="input-field" style="height: 45px; font-size: 1.1rem;">
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="input-group mt-4" style="margin-bottom: 15px;">
                <label for="password_confirmation" class="input-label">パスワード確認</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    autocomplete="new-password" class="input-field" style="height: 45px; font-size: 1.1rem;">
                @error('password_confirmation')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="primary-button"
                style="height: 55px; font-size: 1.3rem; width: 100%;">アカウントを作成</button>
        </form>
    </div>
@endsection
