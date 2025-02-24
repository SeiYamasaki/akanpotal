<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravelアプリ')</title>

    <!-- ✅ Tailwind CSS をCDNで読み込み -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- ✅ `@stack('styles')` を反映する -->
    @stack('styles')
</head>

<body class="bg-gray-100">

    <!-- ✅ 各ページでナビゲーションを表示するか選択 -->
    @yield('nav')

    <!-- ✅ コンテンツエリア -->
    <div class="container mx-auto p-6 mt-20">
        @yield('content')
    </div>

</body>

</html>
