<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopoftrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopoftrains', function (Blueprint $table) {
            
            $table->increments('train_id');           
            $table->integer('visit_id')->unsigned()->index();
            $table->foreign('visit_id')->references('visit_id')->on('visits')->onUpdate('cascade')->onDelete('cascade');
            $table->string('train_people', 200)->nullable();
            $table->string('train_content', 300)->nullable();
            $table->date('train_date')->nullable();          
            $table->string('train_result', 160)->nullable();           
            $table->string('image1', 100)->nullable();
            $table->string('image2', 100)->nullable();
            $table->string('image3', 100)->nullable();
            $table->string('image4', 100)->nullable();
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
        Schema::dropIfExists('shopoftrains');
    }
}
