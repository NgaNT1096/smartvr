<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemeContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_contents', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('num_content');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
            
            $table->integer('content_id')->unsigned();
            $table->foreign('content_id')->references('id')->on('contents');

            $table->integer('theme_id')->unsigned();
            $table->foreign('theme_id')->references('id')->on('themes');
            
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
        Schema::dropIfExists('theme_contents');
    }
}
