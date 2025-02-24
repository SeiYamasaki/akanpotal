<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController; // メッセージコントローラーを追加
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

// ダッシュボード（認証必須）
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// プロフィール関連（認証必須）
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 💡 メッセージ関連（退職代行者と企業間のやり取り）
Route::middleware('auth')->group(function () {
    Route::resource('messages', MessageController::class)->except(['create', 'edit']);
    // → /messages (一覧)
    // → /messages/{id} (詳細)
    // → /messages (POST: 送信)
    // → /messages/{id} (PUT: 更新)
    // → /messages/{id} (DELETE: 削除)
});
Route::post('/logout', function (Request $request) {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');
require __DIR__ . '/auth.php';

Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create'); // 企業用のメッセージ作成ページ
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store'); // 企業用メッセージ送信処理
