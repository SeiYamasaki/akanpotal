@extends('layouts.app')

@section('content')
    <div class="form-container">
        <h1 class="title">本人に伝達事項があれば送信してください｡</h1>

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('messages.store') }}" class="message-form">
            @csrf

            <!-- 送信者名 -->
            <div class="form-group">
                <label for="sender_name">会社名及び担当者名</label>
                <input type="text" id="sender_name" name="sender_name" required>
            </div>

            <!-- メッセージ本文 -->
            <div class="form-group">
                <label for="content">伝達事項･内容</label>
                <textarea id="content" name="content" rows="5" required></textarea>
            </div>

            <!-- 送信ボタン -->
            <div class="button-container">
                <button type="submit" class="submit-button">
                    伝達事項を送信
                </button>
            </div>
        </form>
    </div>
@endsection
