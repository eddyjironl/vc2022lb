<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cgresp;

class vcController extends Controller
{
    //
    public static function getnextnumber($pctable){
        $lnCount = mt_rand(1,1000000);
        return $lnCount;


    }

    public function inicio(){
        return view("escritorio");
    } 

    // Catalogos
    // Responsables.
    //-------------------------------------------------------------------------    
    public function cgresp(){
        $odatos =Cgresp::all();
        return view("cgresp",compact('odatos'));
    }
    public function guardar_cgresp(Request $request){
        // validaciones 

        $request->validate([
            "crespno"=>"required",
            "cfullname"=>"required"
        ]);
        
        
        $data = new Cgresp;
        $data["crespno"] = $request["crespno"];
        $data["cfullname"] = $request["cfullname"];
        $data["mnotas"] = $request["mnotas"];

        $data->save();

        return back()->with("mensaje","Registro Guardado");
    }
    public function editar_crespno($id = null){
        // buscando un dato indiviudal
        $odato = Cgresp::findOrFail($id);
        return view("cgresp_edit",compact('odato'));
    }
    public function actualizar_crespno(Request $request, $id){
        // validando que el nombre no venga vacio
        $request->validate(["cfullname"=>"required"]);
        // obteniendo el modelo con ese Id
        $datos = Cgresp::findOrFail($id);
        // actualizando el valor de lo que viene el formulario
        $datos->cfullname = $request->cfullname;
        $datos->mnotas    = $request->mnotas;
        $datos->save();
        return back()->with("mensaje","Nota Actualizada");
    }
    public function borrar_crespno($id){

        $odata = Cgresp::findOrFail($id);
        $odata->delete();
        return back()->with("mensaje","Registro Eliminado");
    }
    
    // Catalogo de Cuentas
    public function cgctas($id = null){
        return view("cgctas");
    }
    
}
