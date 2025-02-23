@extends('layouts.app')

@section('content')
    <h1>メッセージ詳細</h1>
    <p><strong>内容:</strong> {{ $message->content }}</p>
    <p><strong>ステータス:</strong> {{ $message->status }}</p>

    <form action="{{ route('messages.update', $message->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="status">ステータス更新:</label>
            <select name="status">
                <option value="pending" @if ($message->status == 'pending') selected @endif>pending</option>
                <option value="reviewed" @if ($message->status == 'reviewed') selected @endif>reviewed</option>
                <option value="forwarded" @if ($message->status == 'forwarded') selected @endif>forwarded</option>
            </select>
        </div>
        <button type="submit">更新</button>
    </form>
    <a href="{{ route('messages.index') }}">一覧に戻る</a>
@endsection
