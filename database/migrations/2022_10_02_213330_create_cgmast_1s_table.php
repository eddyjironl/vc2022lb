<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCgmast1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cgmast_1s', function (Blueprint $table) {
            $table->id();
            $table->char("ctrnno",10)->default('');
            $table->char("cperid",10)->default("");
            $table->char("cdesc",100)->default("");
            $table->date("dtrndate")->nullable();
            $table->char("ckqno",10)->default("");
            $table->text("mnotas")->nullable();
            $table->char("crespno",10)->default("");
            $table->char("ctype",2)->default("1");
            $table->char("crefno",100)->default("");
            $table->float("nrate",10,2)->default(1);
            $table->boolean("lpost",10)->default(0);
            $table->char("cstatus",2)->default("OP");
            $table->float("namount",10,2)->default(0);
            $table->float("namount_d",10,2)->default(0);
            $table->unique("ctrnno");
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
        Schema::dropIfExists('cgmast_1s');
    }
}
