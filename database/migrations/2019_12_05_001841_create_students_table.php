<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('nis');
            $table->string('nama');
            $table->char('jk');
            $table->integer('id_rombel')->unsigned();
            $table->foreign('id_rombel')->references('id')->on('rombels')->onDelete('CASCADE');
            $table->integer('id_rayon')->unsigned();
            $table->foreign('id_rayon')->references('id')->on('rayons')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
