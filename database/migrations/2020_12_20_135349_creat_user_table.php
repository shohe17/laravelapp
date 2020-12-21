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
        //1にはテーブル名、2にはテーブルを作成する処理をまとめたクロージャ
        Schema::create('user', function(Blueprint $table){
          $table->increments('id');
          $table->string('name');
          $table->string('mail');
          $table->integer('age');
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
