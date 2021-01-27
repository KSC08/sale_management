<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('customer')->unsigned();
            $table->integer('div_id')->unsigned();
            $table->string('phone_number');
            $table->timestamps();
        });
        Schema::table('user_details', function (Blueprint $table)
        {
            $table->foreign('customer')
                ->references('id')->on('customers')
                ->onDelete('cascade');
        });
        Schema::table('user_details', function (Blueprint $table)
        {
            $table->foreign('div_id')
                ->references('id')->on('divisions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
