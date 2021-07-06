<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_descriptions', function (Blueprint $table) {

            $table->increments('shop_description_id');          
            $table->integer('sid')->unsigned()->index();
            $table->foreign('sid')->references('sid')->on('shopofinfos')->onUpdate('cascade')->onDelete('cascade');
            $table->string('shopface_url', 60)->nullable();
            $table->date('open_time')->nullable();
            $table->date('decoration_time')->nullable();
            $table->date('shopruntime')->nullable();
            $table->date('DMS_time')->nullable();
            $table->string('fax', 20)->nullable();
            $table->string('am', 20)->nullable();
            $table->string('zip_code', 20)->nullable();
            $table->string('shopkeeper', 30)->nullable();
            $table->string('shopkeeper_tel', 15)->nullable();
            $table->string('shopkeeper_email', 40)->nullable();
            $table->string('company_phone', 20)->nullable();
            $table->integer('worker_num')->nullable();
            $table->integer('station_num')->nullable();
            $table->string('shop_area', 10)->nullable();
            $table->string('operation_area', 10)->nullable();
            $table->string('rest_area', 10)->nullable();
            $table->integer('washcar_num')->nullable();
            $table->integer('lift_num')->nullable();
            $table->string('toilet', 10)->nullable();
            $table->string('init_cost', 20)->nullable();
            $table->string('decoration_cost', 20)->nullable();
            $table->string('device_cost', 20)->nullable();
            $table->string('league_cost', 20)->nullable();
            $table->string('stock_cost', 20)->nullable();
            $table->string('payrent', 20)->nullable();
            $table->string('bankliquidity', 20)->nullable();
            $table->string('otherinvestment', 20)->nullable();
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
        Schema::dropIfExists('shop_descriptions');
    }
}
