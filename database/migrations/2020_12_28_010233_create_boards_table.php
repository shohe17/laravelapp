<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 第一引数tb名、2はクロージャ
        Schema::create('boards', function (Blueprint $table) {
            // 自動増分, プライマリーキー
            $table->id();
            // 関連するuserテーブルのレコードidを帆kなするためのもの
            $table->foreignId('user_id');
            $table->string('title');
            $table->string('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
}
