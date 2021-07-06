<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {

            $table->increments('visit_id');            
            $table->integer('plan_id')->unsigned()->index();
            $table->foreign('plan_id')->references('plan_id')->on('plans')->onUpdate('cascade')->onDelete('cascade');
            $table->string('arrive_time', 10)->nullable();
            $table->string('leave_time', 10)->nullable();
            $table->string('arrive_position', 30)->nullable();
            $table->string('leave_position', 30)->nullable();
            $table->float('lunch_time')->nullable();
            $table->float('observed_time')->nullable();
            $table->float('review_time')->nullable();
            $table->float('actionplan_time')->nullable();
            $table->float('train_time')->nullable();
            $table->float('communication_time')->nullable();
            $table->float('summary_time')->nullable();
            $table->string('visittarget', 300)->nullable();
            $table->string('visitplan', 500)->nullable();
            $table->string('crud' ,1);           
            $table->timestamps('dateover');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visits');
    }
}
