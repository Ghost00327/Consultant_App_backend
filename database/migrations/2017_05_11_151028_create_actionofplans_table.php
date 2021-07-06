<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionofplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actionofplans', function (Blueprint $table) {
            
            $table->increments('actionofplan_id');           
            $table->integer('visit_id')->unsigned()->index();
            $table->foreign('visit_id')->references('visit_id')->on('visits')->onUpdate('cascade')->onDelete('cascade');
            $table->string('category', 10)->fullable();
            $table->string('issue', 50)->fullable();
            $table->string('action_target', 100)->fullable();
            $table->string('action_program', 300)->fullable();
            $table->string('executor', 160)->fullable();
            $table->date('develop_time')->fullable();
            $table->date('plan_complete_time')->fullable();
            $table->date('actual_complete_time')->fullable();
            $table->integer('iscomplete')->nullable();
            $table->string('comments', 200)->nullable();
            $table->string('filename', 80)->nullable();
            $table->string('fileattach', 120)->nullable();
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
        Schema::dropIfExists('actionofplans');
    }
}
