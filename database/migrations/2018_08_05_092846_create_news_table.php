<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tag_id')->comment('标签ID')->nullable();
            $table->timestamp('release_at')->comment('发布时间')->nullable();
            $table->string('title')->comment('新闻标题');
            $table->text('content')->comment('新闻内容')->nullable();
            $table->integer('look_num')->comment('查看记录数量')->nullable();
            $table->integer('share_num')->comment('分享数量')->nullable();
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
        Schema::dropIfExists('news');
    }
}
