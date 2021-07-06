<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseofinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baseofinfos', function (Blueprint $table) {
            $table->increments('baseofinfo_id');
            $table->string('item', 10)->nullable();
            $table->string('item_name', 300)->nullable();
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
        Schema::dropIfExists('baseofinfos');
    }
}
