<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // テーブル作成のための処理
    public function up()
    {
        Schema::creat('user', function(Blueprint $table){
          $table->bigIncrements('id');
          $table->timestamp();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // 削除処理
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
