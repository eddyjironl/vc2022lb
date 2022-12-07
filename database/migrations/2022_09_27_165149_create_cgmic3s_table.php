<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCgmic3sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cgmic3s', function (Blueprint $table) {
            $table->id();
            $table->char("cmic3no",10);
            $table->char("cdesc",200);
            $table->text("mnotas")->nullable();
            $table->timestamps();
            $table->unique('cmic3no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cgmic3s');
    }
}
