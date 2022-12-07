<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCgmonmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cgmonms', function (Blueprint $table) {
            $table->id();
            $table->char("cmonid",10);
            $table->char("cdesc",100)->nullable();
            $table->char("csimbolo",10)->nullable();
            $table->char("cmetodo",2);
            $table->text("mnotas")->nullable();
            $table->timestamps();
            $table->unique("cmonid");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cgmonms');
    }
}
