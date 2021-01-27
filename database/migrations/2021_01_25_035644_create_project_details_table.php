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
            $table->increments('id');
            $table->integer('pro_id')->unsigned();
            $table->integer('work_type')->unsigned();
            $table->string('amount_pay');
            $table->string('work_goals');
            $table->string('scope');
            $table->integer('service')->unsigned();
            $table->integer('device')->unsigned();
            $table->integer('risk')->unsigned();
            $table->integer('result');
            $table->integer('Coordinator');
            $table->string('created_by');
            $table->string('update_by');
            $table->timestamps();
        });
        Schema::table('project_details', function (Blueprint $table)
        {
            $table->foreign('pro_id')
                ->references('id')->on('projects')
                ->onDelete('cascade');
        });
        Schema::table('project_details', function (Blueprint $table)
        {
            $table->foreign('work_type')
                ->references('id')->on('working_types')
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
        Schema::dropIfExists('project_details');
    }
}
