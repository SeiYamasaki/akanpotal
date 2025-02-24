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
        $messages = Message::where('agent_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('messages.index', compact('messages'));
    }

    // メッセージ詳細表示
    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('messages.show', compact('message'));
    }

    // 企業からのメッセージ送信処理
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        Message::create([
            'sender_id' => Auth::id(), // 企業側のユーザーID
            'agent_id' => 1, // 退職代行者のID（仮）本番環境では適切に指定する
            'content' => $request->content,
            'status' => 'pending',
        ]);

        return redirect()->route('messages.index')->with('success', 'メッセージを送信しました。');
    }

    // メッセージのステータス更新（退職代行者が確認後、必要に応じてユーザーに転送）
    public function update(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $request->validate([
            'status' => 'required|string'
        ]);
        $message->update(['status' => $request->status]);

        return redirect()->route('messages.index')->with('success', 'メッセージのステータスを更新しました。');
    }

    // メッセージ削除（必要なら）
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('messages.index')->with('success', 'メッセージを削除しました。');
    }

    public function create()
    {
        return view('messages.create'); // 企業側メッセージ作成ページを表示
    }
}
