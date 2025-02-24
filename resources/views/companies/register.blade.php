@extends('layouts.app')

@section('title', '企業登録')

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md mx-auto mt-10">
        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">企業登録フォーム</h2>

        <form action="{{ route('companies.register') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block font-medium text-gray-600">企業名:</label>
                <input type="text" name="name" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label for="email" class="block font-medium text-gray-600">メールアドレス:</label>
                <input type="email" name="email" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label for="password" class="block font-medium text-gray-600">パスワード:</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label for="password_confirmation" class="block font-medium text-gray-600">パスワード確認:</label>
                <input type="password" name="password_confirmation" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                登録
            </button>
        </form>
    </div>
@endsection
