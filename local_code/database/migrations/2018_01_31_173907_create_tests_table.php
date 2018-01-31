<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('enrollment_id')->unsigned();
            $table->integer('chapter_id')->unsigned();
            $table->integer('result')->default(0);
            $table->integer('bestResult')->default(0);
            $table->integer('testNumber')->default(0);
            $table->integer('tested')->default(0);
            $table->integer('passed')->default(0);
            $table->timestamp('tested_at')->nullable();
        });

        Schema::table('tests', function (Blueprint $table) {
            $table->foreign('enrollment_id')->references('id')->on('enrollments')->onDelete('cascade');
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests');
    }
}
