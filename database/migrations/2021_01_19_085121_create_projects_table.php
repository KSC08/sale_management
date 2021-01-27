<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->integer('pro_status')->unsigned();
            $table->integer('pro_type')->unsigned();
            $table->string('created_by');
            $table->string('update_by');
            $table->timestamps();
        });
        Schema::table('projects', function (Blueprint $table)
        {
            $table->foreign('pro_status')
                ->references('id')->on('project_statuses')
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
        Schema::dropIfExists('projects');
    }
}
