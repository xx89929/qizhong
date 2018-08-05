<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebSetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_set', function (Blueprint $table) {
            $table->increments('id');
            $table->string('web_name')->comment('网站名称')->nullable();
            $table->string('seo_name')->comment('标题')->nullable();
            $table->string('seo_description')->comment('关键词')->nullable();
            $table->string('seo_info')->comment('描述')->nullable();
            $table->string('phone')->nullable();
            $table->string('tel')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('web_set');
    }
}
