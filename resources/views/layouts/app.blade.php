<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravelアプリ')</title>

    <!-- ✅ Tailwind CSS をCDNで読み込み -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- ✅ 必要なCSSのみ適用 -->
    @stack('styles')

</head>

<body class="bg-gray-100">

    <!-- ✅ ナビゲーションバーを修正 -->
    <nav class="bg-white shadow-md fixed w-full top-0 left-0 z-50 py-4">
        <div class="container mx-auto flex justify-between items-center px-6">
            <!-- ✅ 左側：ダッシュボードリンク -->
            <a href="{{ route('dashboard') }}" class="text-lg font-semibold text-blue-600">ダッシュボード</a>

            <!-- ✅ 右側：ログアウトボタン（ログイン状態でのみ表示） -->
            <div>
                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            ログアウト
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        ログイン
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- ✅ ナビゲーションバーの下にコンテンツを配置 -->
    <div class="container mx-auto p-6 mt-20">
        @yield('content') <!-- 各ページのコンテンツがここに入る -->
    </div>

</body>

</html>
