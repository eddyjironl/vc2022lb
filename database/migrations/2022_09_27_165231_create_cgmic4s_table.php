<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCgmic4sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cgmic4s', function (Blueprint $table) {
            $table->id();
            $table->char("cmic4no",10);
            $table->char("cdesc",200);
            $table->text("mnotas")->nullable();
            $table->timestamps();
            $table->unique('cmic4no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cgmic4s');
    }
}
