<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {

            $table->increments('plan_id');            
            $table->integer('plantype_id')->unsigned()->index();
            $table->foreign('plantype_id')->references('plantype_id')->on('plantypes')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('sid')->unsigned()->index();
            $table->foreign('sid')->references('sid')->on('shopofinfos')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('start_time', 30)->nullable();
            $table->string('end_time', 30)->nullable();
            $table->integer('isdone')->nullable();
            $table->string('togethercall', 36)->nullable();
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
        Schema::dropIfExists('plans');
    }
}
