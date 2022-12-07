<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cgmonm;
use App\Models\Cgmond;
class cgmonmController extends Controller
{
    //
    public function index(){
        $odata = Cgmonm::paginate(3);
        return view("cgmonm",compact("odata"));
    }
    public function save(Request $request){
        $request->validate(["csimbolo"=>"required","cdesc"=>"required","cmonid"=>"required","cmetodo"=>"required"  ]);

        $otable = new Cgmonm;
        $otable["cmonid"]   = $request["cmonid"];
        $otable["cdesc"]    = $request["cdesc"];
        $otable["csimbolo"] = $request["csimbolo"];
        $otable["cmetodo"]  = $request["cmetodo"];
        $otable["mnotas"]   = $request["mnotas"];
        $otable->save();
        return back()->with("mensaje","Registro Guardado Efectivamente");
    }
    public function edit($id){

        $ocgmonm = Cgmonm::findOrFail($id);
        $odata   = Cgmond::where('cmonid',$ocgmonm["cmonid"])->get();
        return view("cgmonm_edit", compact("ocgmonm","odata"));
    }
    public function update(Request $request, $id){
        // validando
        $request->validate([
            "cdesc" =>"required",
            "csimbolo"=>"required",
            "cmetodo"=>"required"
        ]);
        $ocgmonm = Cgmonm::findOrFail($id);
        $ocgmonm["cdesc"]    = $request["cdesc"];
        $ocgmonm["csimbolo"] = $request["csimbolo"];
        $ocgmonm["cmetodo"]  = $request["cmetodo"];
        $ocgmonm["mnotas"]   = $request["mnotas"];
        $ocgmonm->save();

        return back()->with("mensaje","Registro Actualizado");
    }
    public function delete($id){
        $ocgmic = Cgmonm::findOrFail($id);
        $ocgmic->delete();
        return back()->with("mensaje","Registro eliminado");
    } 
}
