<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSummarymeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summarymeetings', function (Blueprint $table) {

            $table->increments('summarymeeting_id');            
            $table->integer('visit_id')->unsigned()->index();
            $table->foreign('visit_id')->references('visit_id')->on('visits')->onUpdate('cascade')->onDelete('cascade');
            $table->string('meeting_target', 200)->nullable();
            $table->string('meeting_subject', 200)->nullable();
            $table->string('meeting_people', 260)->nullable();
            $table->date('meeting_time')->nullable();
            $table->string('effect', 160)->nullable();
            $table->string('comments', 200)->nullable();
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
        Schema::dropIfExists('summarymeetings');
    }
}
