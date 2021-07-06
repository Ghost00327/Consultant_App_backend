<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSopofreasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sopofreasons', function (Blueprint $table) {

            $table->increments('sopofreason_id');         
            $table->integer('visit_id')->unsigned()->index();
            $table->foreign('visit_id')->references('visit_id')->on('visits')->onUpdate('cascade')->onDelete('cascade');
            $table->string('reason1', 200)->nullable();
            $table->string('reason2', 200)->nullable();
            $table->string('reason3', 200)->nullable();
            $table->string('reason4', 200)->nullable();
            $table->string('reason5', 200)->nullable();
            $table->string('reason6', 200)->nullable();
            $table->string('reason7', 200)->nullable();
            $table->string('reason8', 200)->nullable();
            $table->string('reason9', 200)->nullable();
            $table->string('reason10', 200)->nullable();
            $table->string('reason11', 200)->nullable();
            $table->string('reason12', 200)->nullable();
            $table->string('reason13', 200)->nullable();
            $table->string('reason14', 200)->nullable();
            $table->string('reason15', 200)->nullable();
            $table->string('reason16', 200)->nullable();
            $table->string('reason17', 200)->nullable();
            $table->string('reason18', 200)->nullable();
            $table->string('reason19', 200)->nullable();
            $table->string('reason20', 200)->nullable();
            $table->string('reason21', 200)->nullable();
            $table->string('reason22', 200)->nullable();
            $table->string('reason23', 200)->nullable();
            $table->string('reason24', 200)->nullable();
            $table->string('reason25', 200)->nullable();
            $table->string('reason26', 200)->nullable();
            $table->string('reason27', 200)->nullable();
            $table->string('reason28', 200)->nullable();
            $table->string('reason29', 200)->nullable();
            $table->string('reason30', 200)->nullable();
            $table->string('reason31', 200)->nullable();
            $table->string('reason32', 200)->nullable();
            $table->string('reason33', 200)->nullable();
            $table->string('reason34', 200)->nullable();
            $table->string('reason35', 200)->nullable();
            $table->string('reason36', 200)->nullable();
            $table->string('reason37', 200)->nullable();
            $table->string('reason38', 200)->nullable();
            $table->string('reason39', 200)->nullable();
            $table->string('reason40', 200)->nullable();
            $table->string('reason41', 200)->nullable();
            $table->string('reason42', 200)->nullable();
            $table->string('reason43', 200)->nullable();
            $table->string('reason44', 200)->nullable();
            $table->string('reason45', 200)->nullable();
            $table->string('reason46', 200)->nullable();
            $table->string('reason47', 200)->nullable();
            $table->string('reason48', 200)->nullable();
            $table->string('reason49', 200)->nullable();
            $table->string('reason50', 200)->nullable();
            $table->string('reason51', 200)->nullable();
            $table->string('reason52', 200)->nullable();
            $table->string('reason53', 200)->nullable();
            $table->string('reason54', 200)->nullable();
            $table->string('reason55', 200)->nullable();
            $table->string('reason56', 200)->nullable();
            $table->string('reason57', 200)->nullable();
            $table->string('reason58', 200)->nullable();
            $table->string('reason59', 200)->nullable();
            $table->string('reason60', 200)->nullable();
            $table->string('reason61', 200)->nullable();
            $table->string('reason62', 200)->nullable();
            $table->string('reason63', 200)->nullable();
            $table->string('reason64', 200)->nullable();
            $table->string('reason65', 200)->nullable();
            $table->string('reason66', 200)->nullable();
            $table->string('reason67', 200)->nullable();
            $table->string('reason68', 200)->nullable();
            $table->string('reason69', 200)->nullable();
            $table->string('reason70', 200)->nullable();
            $table->string('reason71', 200)->nullable();
            $table->string('reason72', 200)->nullable();
            $table->string('reason73', 200)->nullable();
            $table->string('reason74', 200)->nullable();
            $table->string('reason75', 200)->nullable();
            $table->string('reason76', 200)->nullable();
            $table->string('reason77', 200)->nullable();
            $table->string('reason78', 200)->nullable();
            $table->string('reason79', 200)->nullable();
            $table->string('reason80', 200)->nullable();
            /*$table->string('reason81', 200)->nullable();
            $table->string('reason82', 200)->nullable();
            $table->string('reason83', 200)->nullable();
            $table->string('reason84', 200)->nullable();
            $table->string('reason85', 200)->nullable();
            $table->string('reason86', 200)->nullable();
            $table->string('reason87', 200)->nullable();
            $table->string('reason88', 200)->nullable();
            $table->string('reason89', 200)->nullable();
            $table->string('reason90', 200)->nullable();
            $table->string('reason91', 200)->nullable();
            $table->string('reason92', 200)->nullable();
            $table->string('reason93', 200)->nullable();
            $table->string('reason94', 200)->nullable();
            $table->string('reason95', 200)->nullable();
            $table->string('reason96', 200)->nullable();
            $table->string('reason97', 200)->nullable();
            $table->string('reason98', 200)->nullable();
            $table->string('reason99', 200)->nullable();
            $table->string('reason100', 200)->nullable();
            $table->string('reason101', 200)->nullable();
            $table->string('reason102', 200)->nullable();
            $table->string('reason103', 200)->nullable();
            $table->string('reason104', 200)->nullable();
            $table->string('reason105', 200)->nullable();
            $table->string('reason106', 200)->nullable();
            $table->string('reason107', 200)->nullable();
            $table->string('reason108', 200)->nullable();
            $table->string('reason109', 200)->nullable();
            $table->string('reason110', 200)->nullable();
            $table->string('reason111', 200)->nullable();
            $table->string('reason112', 200)->nullable();
            $table->string('reason113', 200)->nullable();
            $table->string('reason114', 200)->nullable();
            $table->string('reason115', 200)->nullable();
            $table->string('reason116', 200)->nullable();
            $table->string('reason117', 200)->nullable();
            $table->string('reason118', 200)->nullable();
            $table->string('reason119', 200)->nullable();
            $table->string('reason120', 200)->nullable();*/
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
        Schema::dropIfExists('sopofreasons');
    }
}
