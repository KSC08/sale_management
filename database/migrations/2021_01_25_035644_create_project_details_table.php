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
            $table->string('pmname')->nullable();
            $table->string('pmlname')->nullable();
            $table->string('pmphone')->nullable();
            $table->string('customer')->nullable();
            $table->string('Payment')->nullable();

            $table->string('type_else')->nullable();
           
            $table->string('operational_goals')->nullable();
            $table->string('scope_detail1')->nullable();
            $table->string('scope_detail2')->nullable();
            $table->string('scope_detail3')->nullable();
            $table->string('scope_detail4')->nullable();
            $table->string('scope_detail5')->nullable();
            $table->string('scope_detail6')->nullable();


            $table->string('action_plan1')->nullable();
            $table->string('action_plan_date2')->nullable();
            $table->string('action_plan_date3')->nullable();
            $table->string('action_plan4')->nullable();
            $table->string('action_plan5')->nullable();
            $table->string('action_plan6')->nullable();

            $table->string('finance1')->nullable();
            $table->string('finance2')->nullable();
            $table->string('finance3')->nullable();
            $table->string('finance4')->nullable();
            $table->string('finance5')->nullable();

            $table->string('performance1')->nullable();
            $table->string('performance2')->nullable();

            $table->string('Risk')->nullable();

            // $table->integer('service')->unsigned();
            // $table->integer('device')->unsigned();
            // $table->integer('risk')->unsigned();
            
           
            $table->string('created_by')->nullable();
            $table->string('update_by')->nullable();
            $table->timestamps();
        });
        Schema::table('project_details', function (Blueprint $table)
        {
            $table->foreign('pro_id')
                ->references('id')->on('projects')
                ->onDelete('cascade');
        });
        // Schema::table('project_details', function (Blueprint $table)
        // {
        //     $table->foreign('work_type')
        //         ->references('id')->on('working_types')
        //         ->onDelete('cascade');
        // });
        
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
