<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSopitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sopitems', function (Blueprint $table) {
            $table->increments('sopitem_id');
            $table->string('group', 30)->nullable();
            $table->string('category', 30)->nullable();
            $table->string('range', 30)->nullable();
            $table->string('sop_item', 50)->nullable();
            $table->string('sop_detail', 200)->nullable();
            $table->string('sop_method1', 200)->nullable();
            $table->string('sop_method2', 200)->nullable();
            $table->string('type1', 10)->nullable();
            $table->string('type2', 10)->nullable();
            $table->string('type3', 10)->nullable();
            $table->integer('standard_score')->nullable();
            $table->integer('level')->nullable();
            $table->string('item_num', 10)->nullable();            
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
        Schema::dropIfExists('sopitems');
    }
}
