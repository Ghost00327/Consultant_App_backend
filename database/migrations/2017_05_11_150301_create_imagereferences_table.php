<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagereferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagereferences', function (Blueprint $table) {
            $table->increments('imagereference_id');
            $table->integer('imageitem_id')->unsigned()->index();
            $table->foreign('imageitem_id')->references('imageitem_id')->on('imageitems')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('sopitem_id')->unsigned()->index();
            $table->foreign('sopitem_id')->references('sopitem_id')->on('sopitems')->onUpdate('cascade')->onDelete('cascade');
            
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
        Schema::dropIfExists('imagereferences');
    }
}
