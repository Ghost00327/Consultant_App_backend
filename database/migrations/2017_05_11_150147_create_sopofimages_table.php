<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSopofimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sopofimages', function (Blueprint $table) {

            $table->increments('sopofimage_id');            
            $table->integer('imageitem_id')->unsigned()->index();
            $table->foreign('imageitem_id')->references('imageitem_id')->on('imageitems')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('visit_id')->unsigned()->index();
            $table->foreign('visit_id')->references('visit_id')->on('visits')->onUpdate('cascade')->onDelete('cascade');
            $table->date('photodate')->nullable();
            $table->string('imgurl', 100)->nullable();
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
        Schema::dropIfExists('sopofimages');
    }
}
