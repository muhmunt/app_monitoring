<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_lists', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('id_event')->unsigned();
            $table->foreign('id_event')->references('id')->on('events')->onDelete('CASCADE');
            $table->integer('id_student')->unsigned();
            $table->foreign('id_student')->references('id')->on('students')->onDelete('CASCADE');
            $table->integer('nis');
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
        Schema::dropIfExists('student_lists');
    }
}
