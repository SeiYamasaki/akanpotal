<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>退職代行メッセージポータル</title>
    @if (request()->is('messages/create'))
        <link rel="stylesheet" href="{{ asset('css/create.css') }}">
    @elseif(request()->is('messages'))
        <link rel="stylesheet" href="{{ asset('css/messages.css') }}">
    @endif
</head>

<body class="bg-gray-100">
    <!-- ✅ ナビゲーションバーを上に配置 -->
    <nav class="bg-white border-b border-gray-200 px-4 py-2 flex justify-between">
        <div>
            <a href="{{ route('dashboard') }}" class="text-lg font-bold text-gray-800">Dashboard</a>
        </div>
        <div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                    ログアウト
                </button>
            </form>
        </div>
    </nav>

    <!-- ✅ メインコンテンツ -->
    <div class="max-w-7xl mx-auto p-4">
        @yield('content')
    </div>
</body>

</html>
