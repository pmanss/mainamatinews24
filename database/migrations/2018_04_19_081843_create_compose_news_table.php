<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComposeNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compose_news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('heading');
            $table->integer('rid');
            $table->integer('spid');
            $table->integer('divid');
            $table->integer('disid');
            $table->longtext('content');
            $table->string('top_gallery');
            $table->string('related_news');
            $table->string('top_six');
            $table->integer('cid');
            $table->integer('sid');
            $table->text('thumbnail');
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
        Schema::dropIfExists('compose_news');
    }
}
