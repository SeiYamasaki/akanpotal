@extends('layouts.app')

@section('content')
    <h1>メッセージ一覧</h1>
    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    <ul>
        @foreach ($messages as $message)
            <li>
                <a href="{{ route('messages.show', $message->id) }}">
                    {{ $message->content }} (ステータス: {{ $message->status }})
                </a>
            </li>
        @endforeach
    </ul>
@endsection
