<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('area_id');
            $table->integer('parent_id')->nullable();
            $table->string('code', 20)->nullable();
            $table->string('area_name', 30)->nullable();
            $table->integer('level')->nullable();
            $table->integer('sort')->nullable();
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
        Schema::dropIfExists('areas');
    }
}
