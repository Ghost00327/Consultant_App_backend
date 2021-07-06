<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleofdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saleofdatas', function (Blueprint $table) {

            $table->increments('sale_id');            
            $table->integer('shopbi_id')->unsigned()->index();
            $table->foreign('shopbi_id')->references('shopbi_id')->on('shopofbis')->onUpdate('cascade')->onDelete('cascade');
            $table->string('category_name', 30)->nullable();
            $table->string('last_sale', 15)->nullable();
            $table->string('sale_rate', 15)->nullable();
            $table->string('target_sale', 15)->nullable();
            $table->string('cutoff_sale', 15)->nullable();
            $table->string('target_finished_rate', 15)->nullable();
            $table->string('cross_rate', 15)->nullable();
            $table->string('storage', 15)->nullable();
            $table->string('target_cross_rate', 15)->nullable();
            $table->integer('sindex')->nullable();
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
        Schema::dropIfExists('saleofdatas');
    }
}
