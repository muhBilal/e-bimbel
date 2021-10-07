<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEdulevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edulevels', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100); //otomatis tipe nya adalah var char, name adalah vield name nya dan 100 adalah panjangnya
            $table->text('desc')->nullable(); //nullable () berguna untuk default maka tidak masalah jika table nya tidak di isi
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edulevels');
    }
}