<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopofstaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopofstaffs', function (Blueprint $table) {
            $table->increments('shopofstaff_id');
            $table->integer('sid')->unsigned()->index();
            $table->foreign('sid')->references('sid')->on('shopofinfos')->onUpdate('cascade')->onDelete('cascade');
            $table->string('staff_name', 50)->nullable();
            $table->integer('employ_state')->nullable();
            $table->integer('sex')->default(0);
            $table->string('card_id', 25)->nullable();
            $table->string('learn_identity', 50)->default(0);
            $table->string('position', 50)->default(0);
            $table->string('telephone', 18)->nullable();
            $table->date('entry_date')->nullable();
            $table->string('education', 20)->nullable();
            $table->string('head_url', 50)->nullable();
            $table->string('description', 80)->nullable();
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
        Schema::dropIfExists('shopofstaffs');
    }
}
