@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">退職代行者へのメッセージを送信</h1>

        <!-- メッセージ送信フォーム -->
        <form method="POST" action="{{ route('messages.store') }}">
            @csrf

            <!-- 送信者名（企業名など） -->
            <div class="mb-4">
                <label for="sender_name" class="block text-sm font-medium text-gray-700">会社名・担当者名</label>
                <input type="text" id="sender_name" name="sender_name" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- メッセージ本文 -->
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">メッセージ内容</label>
                <textarea id="content" name="content" rows="5" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>

            <!-- 送信ボタン -->
            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    メッセージを送信
                </button>
            </div>
        </form>
    </div>
@endsection
