@extends('layouts.app')

@section('title', 'メッセージ一覧')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/messages.css') }}">
@endpush

@section('content')
    <div class="message-container">
        <h1 class="title">メッセージ一覧</h1>

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @foreach ($messages as $message)
            <div class="message-card">
                <p class="message-content">{{ $message->content }}</p>

                <!-- ステータスバッジ、詳細ボタン、削除ボタンを横並び -->
                <div class="button-container">
                    <span class="status-badge {{ $message->status }}">
                        ステータス: {{ ucfirst($message->status) }}
                    </span>

                    <a href="{{ route('messages.show', $message->id) }}" class="view-button">
                        詳細を見る
                    </a>

                    <!-- 削除ボタン -->
                    <form action="{{ route('messages.destroy', $message->id) }}" method="POST" class="delete-button-form"
                        onsubmit="return confirm('本当に削除しますか？');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">削除</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
