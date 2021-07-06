<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserofinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userofinfos', function (Blueprint $table) {
            $table->increments('userofinfo_id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('telephone', 15)->nullable();
            $table->string('email', 32)->nullable();
            $table->string('description', 210)->nullable();
            $table->string('headimgurl', 60)->nullable();
            $table->string('sex', 2)->nullable();
            $table->string('company', 50)->nullable();
            $table->string('department', 20)->nullable();
            $table->string('position', 20)->nullable();
            $table->string('address', 120)->nullable();
            $table->date('birthdate')->nullable();
            $table->string('birthplace', 120)->nullable();
            $table->string('nation', 10)->nullable();
            $table->string('id_card', 20)->nullable();
            $table->string('ismarry', 2)->nullable();
            $table->date('graduate_date')->nullable();
            $table->date('entry_date')->nullable();
            $table->string('emergent_phone', 15)->nullable();
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
        Schema::dropIfExists('userofinfos');
    }
}
