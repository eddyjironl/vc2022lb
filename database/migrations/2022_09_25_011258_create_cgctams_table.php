<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCgctamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cgctams', function (Blueprint $table) {
            $table->id();
            $table->char("cctaid",20)->default("");
            $table->char("cdesc",200)->default("");
            $table->char("ctype",1)->default("");   // saldo de cuenta Debe haber ..
            $table->char("cgrupid",1)->default(""); // grupo de cuenta Activo , pasivo...
            $table->boolean("lapplyir")->default(0);
            $table->boolean("lpost")->default(0);
            $table->float("ndebe",16,4)->default(0);
            $table->float("nhaber",16,4)->default(0);
            $table->float("namount",16,4)->default(0);
            $table->float("ndebe_d",16,4)->default(0);
            $table->float("nhaber_d",16,4)->default(0);
            $table->float("namount_d",16,4)->default(0);
            $table->text("mnotas")->nullable();
            $table->char("cmic1no",10)->nullable();
            $table->char("cmic2no",10)->nullable();
            $table->char("cmic3no",10)->nullable();
            $table->char("cmic4no",10)->nullable();
            $table->char("cmic5no",10)->nullable();
            $table->timestamps();
            $table->unique('cctaid');
        });
    }




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cgctams');
    }
}
