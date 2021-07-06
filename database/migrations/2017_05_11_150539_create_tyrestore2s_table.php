<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTyrestore2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tyrestore2s', function (Blueprint $table) {

            $table->increments('tyrestore_id');            
            $table->integer('datareport_id')->unsigned()->index();
            $table->foreign('datareport_id')->references('datareport_id')->on('datareports')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('tyrebrand_id')->unsigned()->index();
            $table->foreign('tyrebrand_id')->references('tyrebrand_id')->on('tyrebrands')->onUpdate('cascade')->onDelete('cascade');
            $table->string('detail', 200)->nullable();
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
        Schema::dropIfExists('tyrestore2s');
    }
}
