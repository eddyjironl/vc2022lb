<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCgmasd1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cgmasd_1s', function (Blueprint $table) {
            $table->id();
            $table->char("ctrnno",10);
            $table->char("cperid",10)->default("");
            $table->char("cdesc",200)->default("");
            $table->char("cctaid",20)->default("");
            $table->float("ndebe",10,2)->default(0);
            $table->float("nhaber",10,2)->default(0);
            $table->date("dtrndate")->nullable();
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
        Schema::dropIfExists('cgmasd_1s');
    }
}
