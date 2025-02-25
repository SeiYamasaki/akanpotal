<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('welcome');
});

// ✅ ダッシュボード（認証必須）
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// ✅ ユーザーの登録フォーム表示（GETリクエスト対応）
Route::get('/register', function () {
    return view('auth.register'); // ユーザー登録フォームのビュー
})->name('register.form');

// ✅ ユーザーの登録処理（POSTリクエスト）
Route::post('/register', [AuthenticatedSessionController::class, 'store'])->name('register');

// ✅ メッセージのルート（認証必須）
Route::middleware('auth')->group(function () {
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index'); // メッセージ一覧
    Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create'); // メッセージ作成
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store'); // メッセージ送信
    Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show'); // メッセージ詳細
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy'); // メッセージ削除
});

// ✅ 共通のログインページ
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// ✅ ログアウト処理（認証必須）
Route::post('/logout', function (Request $request) {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

require __DIR__ . '/auth.php';
