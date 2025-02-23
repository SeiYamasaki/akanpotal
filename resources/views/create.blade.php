@extends('layouts.app')

@section('content')
    <h1>新規メッセージ送信</h1>
    <form action="{{ route('messages.store') }}" method="POST">
        @csrf
        <div>
            <label for="content">メッセージ内容:</label>
            <textarea name="content" required></textarea>
        </div>
        <button type="submit">送信</button>
    </form>
@endsection
