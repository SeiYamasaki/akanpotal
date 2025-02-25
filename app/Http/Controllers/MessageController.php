<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    // メッセージ一覧（退職代行者が企業からのメッセージを確認）
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // ✅ 未ログインの場合はログインページへリダイレクト
        }

        $messages = Message::where('agent_id', Auth::id())->orderBy('created_at', 'desc')->get();

        return view('messages.index', compact('messages'));
    }

    // メッセージ詳細表示（退職代行者専用）
    public function show($id)
    {
        $message = Message::findOrFail($id);

        if (Auth::id() !== $message->agent_id) {
            return redirect()->route('messages.index')->with('error', 'このメッセージを表示する権限がありません。');
        }

        return view('messages.show', compact('message'));
    }

    // 企業からのメッセージ送信処理
    public function store(Request $request)
    {
        $request->validate([
            'sender_name' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Message::create([
            'sender_id' => Auth::id(), // ✅ ログインユーザーIDを必ず保存
            'sender_name' => $request->sender_name, // 企業名または担当者名
            'agent_id' => 1, // 退職代行者のID（仮設定）
            'content' => $request->content,
            'status' => 'pending',
        ]);

        return redirect()->route('messages.create')->with('success', 'メッセージを送信しました。');
    }

    // メッセージのステータス更新（退職代行者専用）
    public function update(Request $request, $id)
    {
        $message = Message::findOrFail($id);

        if (Auth::id() !== $message->agent_id) {
            return redirect()->route('messages.index')->with('error', 'このメッセージを更新する権限がありません。');
        }

        $request->validate([
            'status' => 'required|string'
        ]);

        $message->update(['status' => $request->status]);

        return redirect()->route('messages.index')->with('success', 'メッセージのステータスを更新しました。');
    }

    // メッセージ削除（退職代行者専用）
    public function destroy($id)
    {
        $message = Message::findOrFail($id);

        if (Auth::id() !== $message->agent_id) {
            return redirect()->route('messages.index')->with('error', 'このメッセージを削除する権限がありません。');
        }

        $message->delete();

        return redirect()->route('messages.index')->with('success', 'メッセージを削除しました。');
    }

    // 企業用メッセージ作成ページの表示
    public function create()
    {
        return view('messages.create'); // 企業がメッセージを作成するページ
    }
}
