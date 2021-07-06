<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopofbusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopofbusiness', function (Blueprint $table) {
            $table->increments('bs_id');
            $table->integer('business_id')->unsigned()->index();
            $table->foreign('business_id')->references('business_id')->on('business')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('sid')->unsigned()->index();
            $table->foreign('sid')->references('sid')->on('shopofinfos')->onUpdate('cascade')->onDelete('cascade');           
            $table->string('crud', 1);            
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
        Schema::dropIfExists('shopofbusiness');
    }
}
