@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">メッセージ一覧</h1>

        <!-- ✅ ログアウトボタンを右上に追加 -->
        <div class="flex justify-end mb-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                    ログアウト
                </button>
            </form>
        </div>

        <!-- メッセージ一覧 -->
        @if (session('success'))
            <div class="text-green-600 mb-4">{{ session('success') }}</div>
        @endif

        <ul class="list-disc pl-5">
            @foreach ($messages as $message)
                <li class="mb-2">
                    <a href="{{ route('messages.show', $message->id) }}" class="text-blue-500 hover:underline">
                        {{ $message->content }} (ステータス: {{ $message->status }})
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
