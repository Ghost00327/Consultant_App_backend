<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSopofresultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sopofresults', function (Blueprint $table) {
            $table->increments('sopofresult_id');
            $table->integer('visit_id')->unsigned()->index();
            $table->foreign('visit_id')->references('visit_id')->on('visits')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('sop1')->nullable();
            $table->integer('sop2')->nullable();
            $table->integer('sop3')->nullable();
            $table->integer('sop4')->nullable();
            $table->integer('sop5')->nullable();
            $table->integer('sop6')->nullable();
            $table->integer('sop7')->nullable();
            $table->integer('sop8')->nullable();
            $table->integer('sop9')->nullable();
            $table->integer('sop10')->nullable();
            $table->integer('sop11')->nullable();
            $table->integer('sop12')->nullable();
            $table->integer('sop13')->nullable();
            $table->integer('sop14')->nullable();
            $table->integer('sop15')->nullable();
            $table->integer('sop16')->nullable();
            $table->integer('sop17')->nullable();
            $table->integer('sop18')->nullable();
            $table->integer('sop19')->nullable();
            $table->integer('sop20')->nullable();
            $table->integer('sop21')->nullable();
            $table->integer('sop22')->nullable();
            $table->integer('sop23')->nullable();
            $table->integer('sop24')->nullable();
            $table->integer('sop25')->nullable();
            $table->integer('sop26')->nullable();
            $table->integer('sop27')->nullable();
            $table->integer('sop28')->nullable();
            $table->integer('sop29')->nullable();
            $table->integer('sop30')->nullable();
            $table->integer('sop31')->nullable();
            $table->integer('sop32')->nullable();
            $table->integer('sop33')->nullable();
            $table->integer('sop34')->nullable();
            $table->integer('sop35')->nullable();
            $table->integer('sop36')->nullable();
            $table->integer('sop37')->nullable();
            $table->integer('sop38')->nullable();
            $table->integer('sop39')->nullable();
            $table->integer('sop40')->nullable();
            $table->integer('sop41')->nullable();
            $table->integer('sop42')->nullable();
            $table->integer('sop43')->nullable();
            $table->integer('sop44')->nullable();
            $table->integer('sop45')->nullable();
            $table->integer('sop46')->nullable();
            $table->integer('sop47')->nullable();
            $table->integer('sop48')->nullable();
            $table->integer('sop49')->nullable();
            $table->integer('sop50')->nullable();
            $table->integer('sop51')->nullable();
            $table->integer('sop52')->nullable();
            $table->integer('sop53')->nullable();
            $table->integer('sop54')->nullable();
            $table->integer('sop55')->nullable();
            $table->integer('sop56')->nullable();
            $table->integer('sop57')->nullable();
            $table->integer('sop58')->nullable();
            $table->integer('sop59')->nullable();
            $table->integer('sop60')->nullable();
            $table->integer('sop61')->nullable();
            $table->integer('sop62')->nullable();
            $table->integer('sop63')->nullable();
            $table->integer('sop64')->nullable();
            $table->integer('sop65')->nullable();
            $table->integer('sop66')->nullable();
            $table->integer('sop67')->nullable();
            $table->integer('sop68')->nullable();
            $table->integer('sop69')->nullable();
            $table->integer('sop70')->nullable();
            $table->integer('sop71')->nullable();
            $table->integer('sop72')->nullable();
            $table->integer('sop73')->nullable();
            $table->integer('sop74')->nullable();
            $table->integer('sop75')->nullable();
            $table->integer('sop76')->nullable();
            $table->integer('sop77')->nullable();
            $table->integer('sop78')->nullable();
            $table->integer('sop79')->nullable();
            $table->integer('sop80')->nullable();
           /* $table->integer('sop81')->nullable();
            $table->integer('sop82')->nullable();
            $table->integer('sop83')->nullable();
            $table->integer('sop84')->nullable();
            $table->integer('sop85')->nullable();
            $table->integer('sop86')->nullable();
            $table->integer('sop87')->nullable();
            $table->integer('sop88')->nullable();
            $table->integer('sop89')->nullable();
            $table->integer('sop90')->nullable();
            $table->integer('sop91')->nullable();
            $table->integer('sop92')->nullable();
            $table->integer('sop93')->nullable();
            $table->integer('sop94')->nullable();
            $table->integer('sop95')->nullable();
            $table->integer('sop96')->nullable();
            $table->integer('sop97')->nullable();
            $table->integer('sop98')->nullable();
            $table->integer('sop99')->nullable();
            $table->integer('sop100')->nullable();
            $table->integer('sop101')->nullable();
            $table->integer('sop102')->nullable();
            $table->integer('sop103')->nullable();
            $table->integer('sop104')->nullable();
            $table->integer('sop105')->nullable();
            $table->integer('sop106')->nullable();
            $table->integer('sop107')->nullable();
            $table->integer('sop108')->nullable();
            $table->integer('sop109')->nullable();
            $table->integer('sop110')->nullable();
            $table->integer('sop111')->nullable();
            $table->integer('sop112')->nullable();
            $table->integer('sop113')->nullable();
            $table->integer('sop114')->nullable();
            $table->integer('sop115')->nullable();
            $table->integer('sop116')->nullable();
            $table->integer('sop117')->nullable();
            $table->integer('sop118')->nullable();
            $table->integer('sop119')->nullable();
            $table->integer('sop120')->nullable();*/
            $table->integer('sum')->nullable();
            $table->integer('level')->nullable();
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
        Schema::dropIfExists('sopofresults');
    }
}
