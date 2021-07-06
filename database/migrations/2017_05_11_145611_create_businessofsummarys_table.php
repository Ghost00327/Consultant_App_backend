<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessofsummarysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businessofsummarys', function (Blueprint $table) {
            $table->increments('bs_id');
            $table->integer('shopbi_id')->unsigned()->index();
            $table->foreign('shopbi_id')->references('shopbi_id')->on('shopofbis')->onUpdate('cascade')->onDelete('cascade');
            $table->string('category_name', 30)->nullable();
            $table->string('last_turnover', 15)->nullable();
            $table->string('target_turnover', 15)->nullable();
            $table->string('cutoff_turnover', 15)->nullable();
            $table->string('turnover_rate', 15)->nullable();
            $table->string('turnover_finished_rate', 15)->nullable();
            $table->string('by_turnover_forecast', 15)->nullable();
            $table->string('station_turnover', 15)->nullable();
            $table->string('last_maoli', 15)->nullable();
            $table->string('target_maoli', 15)->nullable();
            $table->string('cutoff_maoli', 15)->nullable();
            $table->string('maoli_rate', 15)->nullable();
            $table->string('maoli_finished_rate', 15)->nullable();
            $table->string('by_maoli_forecast', 15)->nullable();
            $table->string('retail_turnover', 15)->nullable();
            $table->string('station_maoli', 15)->nullable();
            $table->integer('car_traffic')->nullable();
            $table->integer('repair_traffic')->nullable();
            $table->integer('bindex')->nullable();
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
        Schema::dropIfExists('businessofsummarys');
    }
}
