<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTradeofdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tradeofdatas', function (Blueprint $table) {

            $table->integer('trade_id');          
            $table->integer('shopbi_id')->unsigned()->index();
            $table->foreign('shopbi_id')->references('shopbi_id')->on('shopofbis')->onUpdate('cascade')->onDelete('cascade');
            $table->string('category_name', 30)->nullable();
            $table->string('last_trade', 15)->nullable();
            $table->string('target_trade', 15)->nullable();
            $table->string('cutoff_trade', 15)->nullable();
            $table->string('trade_rate', 15)->nullable();
            $table->string('target_finished_rate', 15)->nullable();
            $table->string('trade_yc', 15)->nullable();
            $table->string('SOB', 15)->nullable();
            $table->integer('tindex')->nullable();
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
        Schema::dropIfExists('tradeofdatas');
    }
}
