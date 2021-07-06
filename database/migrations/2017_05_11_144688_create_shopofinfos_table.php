<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopofinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopofinfos', function (Blueprint $table) {
            $table->increments('sid');          
            $table->integer('area_id')->unsigned()->index();
            $table->foreign('area_id')->references('area_id')->on('areas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('shop_style', 30)->nullable();
            $table->string('shop_code', 30)->nullable();
            $table->string('short_name', 30)->nullable();
            $table->string('shop_name', 60)->nullable();
            $table->string('shop_address', 80)->nullable();
            $table->integer('shop_state')->nullable();
            $table->string('head_shop', 36)->nullable();
            $table->integer('isstandard')->nullable();
            $table->string('groupcode', 30)->nullable();
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
        Schema::dropIfExists('shopofinfos');
    }
}
