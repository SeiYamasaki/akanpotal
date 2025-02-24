<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id')->nullable(); // 企業のID（ログイン不要の企業も考慮）
            $table->string('sender_name')->nullable(); // 企業名や担当者名（ログインなしの企業用）
            $table->unsignedBigInteger('agent_id');  // 退職代行者のID
            $table->text('content'); // メッセージ内容
            $table->enum('status', ['pending', 'reviewed', 'forwarded'])->default('pending'); // ステータスをENUMで定義
            $table->timestamps();

            // 外部キー制約（必要なら追加）
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('agent_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
