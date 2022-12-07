<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cgmic4 as Cgmic3;

class cgmic4Controller extends Controller
{
    //
    public function index(){
        $odata = Cgmic3::all();
        return view("cgmic4",compact("odata"));
    }

    public function save(Request $request){
        $request->validate([
            "cmic4no"=>"required",
            "cdesc"=>"required"
        ]);

        $ocgmic2 = new Cgmic3;
        $ocgmic2["cmic4no"] = $request["cmic4no"];
        $ocgmic2["cdesc"]   = $request["cdesc"];
        $ocgmic2["mnotas"]  = $request["mnotas"];
        $ocgmic2->save();
        return back()->with("mensaje","Registro Guardado Efectivamente");
    }

    public function delete($id){
        $ocgmicx = Cgmic3::findOrFail($id);
        $ocgmicx->delete();
        return back()->with("mensaje","Registro Eliminado");
    }
    public function edit($id){
        $odata = Cgmic3::findOrFail($id);
        return view("cgmic4_edit",compact("odata"));
    }
    public function update(Request $request, $id){
        $request->validate([
            "cmic4no"=>"required",
            "cdesc"=>"required"
        ]);
        $ocgmicx = Cgmic3::findOrFail($id);
        $ocgmicx["cmic4no"]  = $request["cmic4no"];
        $ocgmicx["cdesc"]    = $request["cdesc"];
        $ocgmicx["mnotas"]   = $request["mnotas"];
        $ocgmicx->save();
        return back()->with("mensaje","Registro Actualizado");
    }

}
