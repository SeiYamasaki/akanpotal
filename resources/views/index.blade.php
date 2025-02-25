@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold text-gray-800">メッセージ一覧</h1>

        @if (session('success'))
            <div class="text-green-600 bg-green-100 border border-green-400 p-3 rounded mt-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-4 mt-4">
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2">メッセージ</th>
                        <th class="border border-gray-300 px-4 py-2">ステータス</th>
                        <th class="border border-gray-300 px-4 py-2">詳細</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $message->content }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $message->status }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <a href="{{ route('messages.show', $message->id) }}"
                                    class="text-blue-500 hover:underline">詳細を見る</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- ✅ 新規メッセージ作成ボタン -->
        <div class="mt-6 text-center">
            <a href="{{ route('messages.create') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">
                新しいメッセージを作成
            </a>
        </div>
    </div>
@endsection
