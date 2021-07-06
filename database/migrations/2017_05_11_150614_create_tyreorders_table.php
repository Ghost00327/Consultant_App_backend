<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTyreordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tyreorders', function (Blueprint $table) {

            $table->increments('tyreorder_id');            
            $table->integer('datareport_id')->unsigned()->index();
            $table->foreign('datareport_id')->references('datareport_id')->on('datareports')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('tyrebrand_id')->unsigned()->index();
            $table->foreign('tyrebrand_id')->references('tyrebrand_id')->on('tyrebrands')->onUpdate('cascade')->onDelete('cascade');
            $table->string('ordernum', 10)->nullable();
            $table->string('orderprice', 10)->nullable();
            $table->string('order_total', 20)->nullable();
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
        Schema::dropIfExists('tyreorders');
    }
}
