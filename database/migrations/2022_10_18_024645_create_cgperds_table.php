<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCgperdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cgperds', function (Blueprint $table) {
            $table->id();
            $table->char("cperid",10)->default("");
            $table->char("cdesc",200)->default("");
            $table->date("dstarper")->nullable();
            $table->date("dendper")->nullable();
            $table->char("cyear",4)->nullable();
            $table->boolean("lclose")->default(0);
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
        Schema::dropIfExists('cgperds');
    }
}
