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
            $table->string('pmname');
            $table->string('pmlname');
            $table->string('pmphone');
            $table->string('customer');
            $table->string('Payment');

           
            $table->string('operational_goals');
            $table->string('scope_detail1');
            $table->string('scope_detail2');
            $table->string('scope_detail3');
            $table->string('scope_detail4');
            $table->string('scope_detail5');
            $table->string('scope_detail6');


            $table->string('action_plan1');
            $table->string('action_plan_date2');
            $table->string('action_plan_date3');
            $table->string('action_plan4');
            $table->string('action_plan5');
            $table->string('action_plan6');

            $table->string('finance1');
            $table->string('finance2');
            $table->string('finance3');
            $table->string('finance4');
            $table->string('finance5');

            $table->string('performance1');
            $table->string('performance2');

            $table->string('Risk');

            // $table->integer('service')->unsigned();
            // $table->integer('device')->unsigned();
            // $table->integer('risk')->unsigned();
            
           
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
