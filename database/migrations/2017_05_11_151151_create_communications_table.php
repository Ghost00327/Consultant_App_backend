<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communications', function (Blueprint $table) {
            
            $table->increments('communication_id');           
            $table->integer('visit_id')->unsigned()->index();
            $table->foreign('visit_id')->references('visit_id')->on('visits')->onUpdate('cascade')->onDelete('cascade');
            $table->string('people', 200)->nullable();
            $table->string('content', 600)->nullable();
            $table->string('result', 200)->nullable();
            $table->string('comments', 100)->nullable();
            $table->datetime('communication_time')->nullable();
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
        Schema::dropIfExists('communications');
    }
}
