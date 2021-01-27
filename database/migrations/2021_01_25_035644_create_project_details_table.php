<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_details', function (Blueprint $table) {
            $table->id();
            $table->integer('pro_id')->unsigned();
            $table->foreign('pro_id')->references('id')->on('projects');
            $table->string('work_type');
            $table->string('payment');
            $table->string('amount_pay');
            $table->string('work_goals');
            $table->string('scope');
            $table->integer('service')->unsigned();
            $table->integer('device')->unsigned();
            $table->integer('fines')->unsigned();
            $table->integer('operation_plan')->unsigned();
            $table->integer('financial')->unsigned();
            $table->integer('result')->unsigned();
            $table->integer('document')->unsigned();
            $table->integer('Coordinator')->unsigned();
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
        Schema::dropIfExists('project_details');
    }
}
