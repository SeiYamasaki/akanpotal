@extends('layouts.app')

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
                <span class="status-badge {{ $message->status }}">
                    ステータス: {{ ucfirst($message->status) }}
                </span>
                <a href="{{ route('messages.show', $message->id) }}" class="view-button">
                    詳細を見る
                </a>
            </div>
        @endforeach
    </div>
@endsection
