@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@section('nav')
    @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-button">
                ログアウト
            </button>
        </form>
    @endauth
@endsection

@section('content')
    <div class="container mx-auto p-6 flex justify-center items-center min-h-screen">
        <div class="text-center w-full max-w-2xl">
            <h1 class="text-4xl font-bold text-gray-800">退職代行モーアカン®</h1>

            <div class="bg-white shadow-lg rounded-lg p-8 mt-6 w-full">
                <h3 class="text-xl font-semibold text-gray-700">御社専用のダッシュボードです｡</h3>
                <p class="text-lg text-gray-600 mt-3">退職者に対して伝達ができます｡</p>

                <!-- ✅ 新規メッセージ作成ボタン -->
                <div class="mt-6 text-center">
                    <a href="{{ route('messages.create') }}"
                        class="bg-blue-500 text-white px-5 py-3 rounded-lg shadow-lg hover:bg-blue-600 text-lg">
                        伝達する
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
