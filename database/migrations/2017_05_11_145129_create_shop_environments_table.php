<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopEnvironmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_environments', function (Blueprint $table) {

            $table->increments('shop_environment_id');          
            $table->integer('sid')->unsigned()->index();
            $table->foreign('sid')->references('sid')->on('shopofinfos')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('carbeauty_num')->nullable();
            $table->integer('car_quickrepair_num')->nullable();
            $table->integer('car4s_num')->nullable();
            $table->integer('car_repair_num')->nullable();
            $table->integer('gas_station_num')->nullable();
            $table->integer('supermarket_num')->nullable();
            $table->integer('tyreshop_num')->nullable();  
            $table->integer('club_num')->nullable();
            $table->integer('othershop_num')->nullable();        
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
        Schema::dropIfExists('shop_environments');
    }
}
