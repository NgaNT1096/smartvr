<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('rented_date');
            $table->float('actual_price');
            $table->string('description');

            $table->integer('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')->on('employees');

            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');

            $table->integer('plan_id')->unsigned();
            $table->foreign('plan_id')->references('id')->on('plans');

            $table->integer('theme_content_id')->unsigned();
            $table->foreign('theme_content_id')->references('id')->on('theme_contents');

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
        Schema::dropIfExists('rentals');
    }
}
