
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divisions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullName');
            $table->string('shortName');
            $table->integer('dep_id')->unsigned();
            $table->timestamps();
        });
        //Add foreign key for users table
        Schema::table('users', function (Blueprint $table)
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
        Schema::dropIfExists('divisions');
    }
}

