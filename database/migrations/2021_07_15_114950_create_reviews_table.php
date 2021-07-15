<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            //カラムを追加
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            // 指定したカラムに外部キー制約を定義
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title'); //ライトノベル名
            $table->string('author_name'); //作者
            $table->bigInteger('category_id'); //カテゴリ
            $table->string('impressions'); //感想
            $table->string('image')->nullable(); //画像
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
