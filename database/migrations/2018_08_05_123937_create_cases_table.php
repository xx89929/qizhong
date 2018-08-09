<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cover_img');
            $table->string('name');
            $table->string('content')->nullable();
            $table->string('pc_img')->nullable();
            $table->string('mobile_img')->nullable();
            $table->string('Category')->comment('案例分类')->nullable();
            $table->string('href')->comment('案例链接')->nullable();
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
        Schema::dropIfExists('cases');
    }
}
