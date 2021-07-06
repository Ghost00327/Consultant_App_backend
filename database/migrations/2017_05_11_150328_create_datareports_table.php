<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatareportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datareports', function (Blueprint $table) {

            $table->increments('datareport_id');         
            $table->integer('visit_id')->unsigned()->index();
            $table->foreign('visit_id')->references('visit_id')->on('visits')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('user_id')->nullable();
            $table->string('datatype', 10)->nullable();
            $table->datetime('report_date')->nullable();
            $table->string('comments', 200)->nullable();
            $table->string('total_amount', 20)->nullable();
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
        Schema::dropIfExists('datareports');
    }
}
