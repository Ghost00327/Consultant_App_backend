<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleofdata2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saleofdata2s', function (Blueprint $table) {

            $table->increments('sale2_id');
            $table->integer('shopbi_id')->unsigned()->index();
            $table->foreign('shopbi_id')->references('shopbi_id')->on('shopofbis')->onUpdate('cascade')->onDelete('cascade');
            $table->string('category_name', 30)->nullable();
            $table->string('product_brand', 30)->nullable();
            $table->string('size', 20)->nullable();
            $table->string('salevalue', 20)->nullable();
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
        Schema::dropIfExists('saleofdata2s');
    }
}
