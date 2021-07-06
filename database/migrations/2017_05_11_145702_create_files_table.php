<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('file_id');
            $table->string('filename', 100)->nullable();
            $table->string('filetype', 20)->nullable();
            $table->string('filesize', 20)->nullable();
            $table->string('fileform', 20)->nullable();
            $table->string('file_explain', 200)->nullable();
            $table->string('filepath', 200)->nullable();
            $table->date('filedate')->nullable();
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
        Schema::dropIfExists('files');
    }
}
