<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReadofinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('readofinfos', function (Blueprint $table) {
            $table->increments('readofinfo_id');
            $table->integer('infocenter_id')->unsigned()->index();
            $table->foreign('infocenter_id')->references('infocenter_id')->on('infocenters')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('readofinfos');
    }
}
