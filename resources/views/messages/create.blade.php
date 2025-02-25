@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endpush

@section('content')
    <div class="form-container">
        <h1 class="title">本人への伝達事項を送信してください｡</h1>

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="error-message">{{ session('error') }}</div>
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

    <!-- 伝達事項の例 -->
    <div class="example-container">
        <h2>伝達事項の例</h2>
        <ul>
            <li>■離職票発行後発送した旨の連絡<br>離職票は企業側に発行の義務があります｡退職日より10日以内に企業所轄のハローワークにて発行依頼をしてください｡発行しない場合は雇用保険法第83条4号により、6ヶ月以下の懲役または30万円以下の罰金が科される可能性がありますのでご注意ください｡</li>
            <br>
            <li>■退職届書類記載の金融機関口座に給与を振り込んだ場合</li>
            <br>
            <li>■雇用保険被保険者資格喪失確認通知書発行後発送した旨の連絡</li>
            <br>
            <li>■有給残存日数の連絡</li>
            <br>
            <li>■返却物の回収について</li>

        </ul>
    </div>
@endsection
