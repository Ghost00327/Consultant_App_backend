<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaoliofdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maoliofdatas', function (Blueprint $table) {
            $table->increments('maoli_id');
            $table->integer('shopbi_id')->unsigned()->index();
            $table->foreign('shopbi_id')->references('shopbi_id')->on('shopofbis')->onUpdate('cascade')->onDelete('cascade');
            $table->string('category_name', 30)->nullable();
            $table->string('last_maoli', 15)->nullable();
            $table->string('target_maoli', 15)->nullable();
            $table->string('cutoff_maoli', 15)->nullable();
            $table->string('cutoff_price', 15)->nullable();
            $table->integer('mindex')->nullable();
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
        Schema::dropIfExists('maoliofdatas');
    }
}
