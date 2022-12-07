/7967<?php

use App\Http\Controllers\cgctamController;
use App\Http\Controllers\cgmast_1Controller;
use App\Http\Controllers\cgmic1Controller;
use App\Http\Controllers\cgmic2Controller;
use App\Http\Controllers\cgmic3Controller;
use App\Http\Controllers\cgmic4Controller;
use App\Http\Controllers\cgmic5Controller;
use App\Http\Controllers\CgmonmController;
use App\Http\Controllers\CgmondController;
use App\Http\Controllers\CgperdController;
use App\Http\Controllers\CgsetupController;

use App\Http\Controllers\vcController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [vcController::class,"inicio"])->name("inicio");
//-------------------------------------------------------------------------------------------------------------
// Catalogos
//-------------------------------------------------------------------------------------------------------------
// A- Responsables
    Route::get("/responsables",[vcController::class,"cgresp"])->name("cgresp");
    Route::post("/responsables",[vcController::class,"guardar_cgresp"])->name("guardar_cgresp");
    Route::get("/responsables/editar/{id?}",[vcController::class,"editar_crespno"])->name("editar_crespno");
    Route::put("/responsables/actualizar/{id}",[vcController::class,"actualizar_crespno"])->name("actualizar_crespno");
    Route::delete("/responsables/borrar/{id}",[vcController::class,"borrar_crespno"])->name("borrar_crespno");
// B- catalogo de cuentas
    Route::get("/cuentas",[cgctamController::class,"index"])->name("cgctas");
    Route::post("/cuentas",[cgctamController::class,"save"])->name("guardar_cgctam");
    Route::get("/cuentas/editar/{id}",[cgctamController::class,"edit"])->name("editar_cgctam");
    Route::put("/cuentas/actualizar/{id}",[cgctamController::class,"update"])->name("actualizar_cgctam");
    Route::delete("/cuentas/delete/{id}",[cgctamController::class,"delete"])->name("borrar_cgctam");


// C- Tipos de cambio
    Route::get("/cgmonm",[CgmonmController::class,"index"])->name("cgmonm");
    Route::post("/cgmonm",[CgmonmController::class,"save"])->name("guardar_cgmonm"); 
    Route::get("/cgmonm/edit/{id}",[CgmonmController::class,"edit"])->name("editar_cgmonm");
    Route::delete("/cgmonm/delete/{id}",[CgmonmController::class,"delete"])->name("borrar_cgmonm");
    Route::put("/cgmonm/actualizar/{id}",[CgmonmController::class,"update"])->name("actualizar_cgmonm");
    // detalle de fechas
    Route::put("/cgmond/actualizar/{id}",[CgmondController::class,"update"])->name("actualizar_cgmond");
    Route::delete("/cgmond/delete/{id}",[CgmondController::class,"delete"])->name("borrar_cgmond");
    Route::get("/cgmond/edit/{monid}/{id}",[CgmondController::class,"edit"])->name("editar_cgmond");





// D- agrupaciones del catalogo contable
    Route::get("/cgmic1",[cgmic1Controller::class,"index"])->name("cgmic1");
    Route::post("/cgmic1",[cgmic1Controller::class,"save"])->name("guardar_cgmic1");
    Route::get("/cgmic1/edit/{id}",[cgmic1Controller::class,"edit"])->name("editar_cgmic1");
    Route::put("/cgmic1/actualizar/{id}",[cgmic1Controller::class,"update"])->name("actualizar_cgmic1");
    Route::delete("/cgmic1/delete/{id}",[cgmic1Controller::class,"delete"])->name("borrar_cgmic1");

// agrupaciones del catalogo contable 2
    Route::get("/cgmic2",[cgmic2Controller::class,"index"])->name("cgmic2");
    Route::post("/cgmic2",[cgmic2Controller::class,"save"])->name("guardar_cgmic2");
    Route::get("/cgmic2/edit/{id}",[cgmic2Controller::class,"edit"])->name("editar_cgmic2");
    Route::put("/cgmic2/actualizar/{id}",[cgmic2Controller::class,"update"])->name("actualizar_cgmic2");
    Route::delete("/cgmic2/delete/{id}",[cgmic2Controller::class,"delete"])->name("borrar_cgmic2");

// agrupaciones del catalogo contable 3
    Route::get("/cgmic3",[cgmic3Controller::class,"index"])->name("cgmic3");
    Route::post("/cgmic3",[cgmic3Controller::class,"save"])->name("guardar_cgmic3");
    Route::get("/cgmic3/edit/{id}",[cgmic3Controller::class,"edit"])->name("editar_cgmic3");
    Route::put("/cgmic3/actualizar/{id}",[cgmic3Controller::class,"update"])->name("actualizar_cgmic3");
    Route::delete("/cgmic3/delete/{id}",[cgmic3Controller::class,"delete"])->name("borrar_cgmic3");

// agrupaciones del catalogo contable 4
    Route::get("/cgmic4",[cgmic4Controller::class,"index"])->name("cgmic4");
    Route::post("/cgmic4",[cgmic4Controller::class,"save"])->name("guardar_cgmic4");
    Route::get("/cgmic4/edit/{id}",[cgmic4Controller::class,"edit"])->name("editar_cgmic4");
    Route::put("/cgmic4/actualizar/{id}",[cgmic4Controller::class,"update"])->name("actualizar_cgmic4");
    Route::delete("/cgmic4/delete/{id}",[cgmic4Controller::class,"delete"])->name("borrar_cgmic4");

// agrupaciones del catalogo contable 5
    Route::get("/cgmic5",[cgmic5Controller::class,"index"])->name("cgmic5");
    Route::post("/cgmic5",[cgmic5Controller::class,"save"])->name("guardar_cgmic5");
    Route::get("/cgmic5/edit/{id}",[cgmic5Controller::class,"edit"])->name("editar_cgmic5");
    Route::put("/cgmic5/actualizar/{id}",[cgmic5Controller::class,"update"])->name("actualizar_cgmic5");
    Route::delete("/cgmic5/delete/{id}",[cgmic5Controller::class,"delete"])->name("borrar_cgmic5");
// Registro de Asientos de diario
    Route::get("/cgmast_1",[cgmast_1Controller::class,"index"])->name("cgmast_1");
    Route::post("/comprobantes/guardar",[cgmast_1Controller::class,"save"])->name("guardar_cgmast_1");
//-------------------------------------------------------------------------------------------------------------
// Configuracion
//-------------------------------------------------------------------------------------------------------------
Route::get("/cgperd",[cgperdController::class,"index"])->name("cgperd");
Route::post("/periodo/guardar",[cgperdController::class,"save"])->name("guardar_cgperd");

// configuracion del modulo contable
Route::get("/cgsetup",[cgsetupController::class,"index"])->name("cgsetup");
Route::post("/cgsetup",[cgsetupController::class,"save"])->name("guardar_cgsetup");
Route::get("/cgsetup/new",[cgsetupController::class,"new"])->name("nuevo_cgsetup");
