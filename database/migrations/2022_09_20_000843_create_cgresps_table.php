<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCgrespsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cgresps', function (Blueprint $table) {
            $table->id();
            $table->string("crespno",10);
            $table->string("cfullname",100)->default("");
            $table->text("mnotas")->nullable();
            $table->timestamps();
            $table->unique('crespno');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cgresps');
    }
}
