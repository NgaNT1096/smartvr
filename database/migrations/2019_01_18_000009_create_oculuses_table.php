<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOculusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oculuses', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->string('status')->nullable();
            $table->timestamps();

            $table->integer('rental_id')->unsigned()->nullable();
            $table->foreign('rental_id')->references('id')->on('rentals');
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
        Schema::dropIfExists('oculuses');
    }
}
