<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('welcome');
});

// ✅ ダッシュボード（認証必須）
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ✅ 企業のアカウント登録は不要になったため削除

// ✅ ユーザーの登録フォーム表示（GETリクエスト対応）
Route::get('/register', function () {
    return view('auth.register'); // ユーザー登録フォームのビュー
})->name('register.form');

// ✅ ユーザーの登録処理（POSTリクエスト）
Route::post('/register', [AuthenticatedSessionController::class, 'store'])->name('register');

// ✅ メッセージの一覧ページ（正しく表示させるためのルート）
Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');

// ✅ メッセージ作成ページ（ログイン不要）
Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');

// ✅ メッセージ送信処理
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');

// ✅ メッセージの詳細表示
Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');

// ✅ メッセージの削除（認証必須）
Route::middleware('auth')->group(function () {
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
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
