<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTyrebrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tyrebrands', function (Blueprint $table) {

            $table->increments('tyrebrand_id');            
            $table->string('brand_code', 20)->nullable();
            $table->string('brand_name', 50)->nullable();
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
        Schema::dropIfExists('tyrebrands');
    }
}
