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
        $table->unsignedBigInteger('sender_id'); // 企業のID
        $table->unsignedBigInteger('agent_id');  // 退職代行者のID
        $table->text('content');
        $table->string('status')->default('pending'); // pending, reviewed, forwarded
        $table->timestamps();
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
