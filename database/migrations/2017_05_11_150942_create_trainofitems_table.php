<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainofitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainofitems', function (Blueprint $table) {

            $table->increments('trainofitem_id');
            $table->integer('trainitem_id')->unsigned()->index();
            $table->foreign('trainitem_id')->references('trainitem_id')->on('trainitems')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('train_id')->unsigned()->index();
            $table->foreign('train_id')->references('train_id')->on('shopoftrains')->onUpdate('cascade')->onDelete('cascade');            
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
        Schema::dropIfExists('trainofitems');
    }
}
