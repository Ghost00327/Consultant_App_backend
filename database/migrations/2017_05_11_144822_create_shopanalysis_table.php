<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopanalysisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopanalysis', function (Blueprint $table) {
            $table->increments('shopanalysis_id');
            $table->integer('sid')->unsigned()->index();
            $table->foreign('sid')->references('sid')->on('shopofinfos')->onUpdate('cascade')->onDelete('cascade');
            $table->string('S_selft', 120)->nullable();
            $table->string('S_selft1', 120)->nullable();
            $table->string('S_selft2', 120)->nullable();
            $table->string('W_owner', 120)->nullable();
            $table->string('W_owner1', 120)->nullable();
            $table->string('W_owner2', 120)->nullable();
            $table->string('O_change', 120)->nullable();
            $table->string('O_change1', 120)->nullable();
            $table->string('O_change2', 120)->nullable();
            $table->string('T_danger', 120)->nullable();
            $table->string('T_danger1', 120)->nullable();
            $table->string('T_danger2', 120)->nullable();
            $table->string('increase', 120)->nullable();
            $table->string('increase1', 120)->nullable();
            $table->string('increase2', 120)->nullable();
            $table->string('plan_1', 200)->nullable();
            $table->string('plan_2', 200)->nullable();
            $table->string('plan_3', 200)->nullable();
            $table->string('plan_4', 200)->nullable();
            $table->string('plan_5', 200)->nullable();
            $table->string('plan_6', 200)->nullable();
            $table->string('plan_7', 200)->nullable();
            $table->string('plan_8', 200)->nullable();
            $table->string('plan_9', 200)->nullable();
            $table->string('plan_10', 200)->nullable();
            $table->string('plan_11', 200)->nullable();
            $table->string('plan_12', 200)->nullable();
            $table->string('other_plan', 200)->nullable();
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
        Schema::dropIfExists('shopanalysis');
    }
}
