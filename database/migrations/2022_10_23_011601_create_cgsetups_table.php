<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCgsetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cgsetups', function (Blueprint $table) {
            $table->id();
            $table->integer("ntrnno1")->default(1);
            $table->integer("ntrnno2")->default(1);
            $table->integer("ntrnno3")->default(1);
            $table->integer("ntrnno4")->default(1);
            $table->float("ncashamt",10,2)->default(0);
            $table->char("cperid",10)->nullable();
            $table->char("cmonid",10)->nullable();
            $table->char("cctano1",20)->nullable();
            $table->char("cctano2",20)->nullable();
            $table->char("cctano3",20)->nullable();
            $table->char("cctano4",20)->nullable();
            $table->char("cctano5",20)->nullable();
            $table->char("cctano6",20)->nullable();
            $table->char("cfirma1",50)->nullable();
            $table->char("lnConfRChk",2)->nullable();
            $table->boolean("lviewF1")->default(0);
            $table->char("ctitulo1",50)->nullable();
            $table->char("cfirma2",50)->nullable();
            $table->boolean("lviewF2")->default(0);
            $table->char("ctitulo2",50)->nullable();
            $table->char("cfirma3",50)->nullable();
            $table->boolean("lviewF3")->default(0);
            $table->char("ctitulo3",50)->nullable();
            $table->boolean("llogoBC")->default(0);
            $table->boolean("llogoBG")->default(0);
            $table->boolean("llogoER")->default(0);
            $table->float("nrentax",10,2)->default(0);

            $table->char("cmic1desc",50)->nullable();
            $table->char("cmic2desc",50)->nullable();
            $table->char("cmic3desc",50)->nullable();
            $table->char("cmic4desc",50)->nullable();
            $table->char("cmic5desc",50)->nullable();
            
            $table->boolean("lmic1desc")->default(0);
            $table->boolean("lmic2desc")->default(0);
            $table->boolean("lmic3desc")->default(0);
            $table->boolean("lmic4desc")->default(0);
            $table->boolean("lmic5desc")->default(0);
            
            $table->integer("nmic1desc")->default(0);
            $table->integer("nmic2desc")->default(0);
            $table->integer("nmic3desc")->default(0);
            $table->integer("nmic4desc")->default(0);
            $table->integer("nmic5desc")->default(0);
           
            $table->boolean("lmic1desc1")->default(0);
            $table->boolean("lmic1desc2")->default(0);
            $table->boolean("lmic1desc3")->default(0);
            $table->boolean("lmic1desc4")->default(0);
           
            $table->boolean("lmic2desc1")->default(0);
            $table->boolean("lmic2desc2")->default(0);
            $table->boolean("lmic2desc3")->default(0);
            $table->boolean("lmic2desc4")->default(0);
           
            $table->boolean("lmic3desc1")->default(0);
            $table->boolean("lmic3desc2")->default(0);
            $table->boolean("lmic3desc3")->default(0);
            $table->boolean("lmic3desc4")->default(0);
   
            $table->boolean("lmic4desc1")->default(0);
            $table->boolean("lmic4desc2")->default(0);
            $table->boolean("lmic4desc3")->default(0);
            $table->boolean("lmic4desc4")->default(0);
  
            $table->boolean("lmic5desc1")->default(0);
            $table->boolean("lmic5desc2")->default(0);
            $table->boolean("lmic5desc3")->default(0);
            $table->boolean("lmic5desc4")->default(0);
            // $table->float("lnConfRChk",1)->default(0);
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
        Schema::dropIfExists('cgsetups');
    }
}
