<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // to be equal user_id
            $table->increments('id');
            $table->integer('role_id')->unsigned()->index();
            $table->foreign('role_id')->references('role_id')->on('roles')->onUpdate('cascade')->onDelete('cascade');  
            $table->string('area', 10)->nullable();
            $table->string('name', 20)->nullable();           
            $table->string('password', 60)->nullable();
            $table->string('real_name', 30)->nullable();
            $table->string('en_name', 30)->nullable();
            $table->integer('parent_uid')->nullable();
            $table->string('crud', 1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
