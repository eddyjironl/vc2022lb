<?php

namespace App\Http\Controllers;
use App\Models\Cgresp;
use App\Models\Cgmasd_1;
use App\Models\Cgctam;
use App\Models\Cgmast_1;
use App\Models\Cgperd;

use Illuminate\Http\Request;

class cgmast_1Controller extends Controller
{
    //
    public function index(){
        $orespnos = Cgresp::all();
        $ocuentas = Cgctam::all();
        $ocgperds = Cgperd::all();
        
        $odata = [];
        return view("cgmast_1",compact("orespnos","ocuentas","ocgperds"));
    }

    public function save(Request $request){
        $request->validate(["crespno"=>"required",
                            "cperid"=>"required",
                            "dtrndate"=>"required",
                            "ctype"=>"required",
                            "stock" => 'sometimes|array',
                            "stock.*" => 'integer|min:1|exists:products,id',
                            "stock.*.*" => 'integer|min:0']);

        $lccount   = vcController::getnextnumber("cgmast_1");
        // --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        // guardando encabezado    
        // --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $ocgmast_1 = new Cgmast_1;
        $ocgmast_1["crespno"]  = $request["crespno"];
        $ocgmast_1["dtrndate"] = $request["dtrndate"];
        $ocgmast_1["ctype"]    = $request["ctype"];
        $ocgmast_1["cperid"]  = $request["cperid"];
        $ocgmast_1["cdesc"]   = $request["cdesc"];
        $ocgmast_1["crefno"]  = $request["crefno"];
        $ocgmast_1["nrate"]   = $request["nrate"];
        $ocgmast_1["ctrnno"]  = $lccount;
        $ocgmast_1["mnotas"]  = $request["mnotas"];
        $ocgmast_1->save();

        // --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        // guardando detalle
        // --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        //foreach ($request->tid as $productId => $stock) {
        $lnveces = count($request["tid"]);
        for ($i=0; $i < $lnveces ; $i++) { 
            // haciendo modelo nuevo por cada registro 
            $oRow = new Cgmasd_1;
            $oRow["cperid"] = $request["cperid"];
            $oRow["ctrnno"] = $lccount;
            $oRow["cctaid"] = $request["tid"][$i];
            $oRow["cdesc"]  = $request["tcdesc"][$i];
            $oRow["ndebe"]  = ($request["tndebe"][$i]  == null)? 0:$request["tndebe"][$i];
            $oRow["nhaber"] = ($request["tnhaber"][$i] == null)? 0:$request["tnhaber"][$i];
            $oRow["dtrndate"] = $request["dtrndate"];
            $oRow->save();
            /*
                if ($product = Cgctam::find($productId)) {
                    $product->stock = $stock;
                $product->save();
                }
                */
        }
        return back()->with("mensaje","Registro actualizado");
    }

}
