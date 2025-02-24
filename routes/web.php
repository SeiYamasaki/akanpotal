<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
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

// ✅ 企業がメッセージを作成するページ（ログイン不要）
Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');

// ✅ 企業のメッセージ送信（ログイン不要）
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');

// ✅ 退職代行者用（認証必須）
Route::middleware('auth')->group(function () {
    Route::resource('messages', MessageController::class)->except(['create', 'edit', 'store']);
});

Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');


// ✅ ログアウト処理
Route::post('/logout', function (Request $request) {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

require __DIR__ . '/auth.php';
