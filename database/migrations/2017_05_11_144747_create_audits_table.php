<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audits', function (Blueprint $table) {
            $table->increments('audit_id');            
            $table->integer('sid')->unsigned()->index();           
            $table->foreign('sid')->references('sid')->on('shopofinfos')->onUpdate('cascade')->onDelete('cascade');
            $table->string('year', 10)->nullable();
            $table->string('month', 10)->nullable();
            $table->string('type', 10)->nullable();
            $table->string('auditresult', 300)->nullable();
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
        Schema::dropIfExists('audits');
    }
}
