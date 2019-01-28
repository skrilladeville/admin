<?php


namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use App\PricePreset;
use App\Http\Controllers\Controller;

class PricePresetController extends Controller
{
    public function store(Request $request)
    {   
       $pricePreset= PricePreset::create($request->only(["name","price_type","is_custom_prices","is_dynamic_preset"]));
       return $pricePreset;
    }



    public function getPrices($id){
        $price_preset= PricePreset::find($id);
        return $price_preset->prices;
    }


    public function index(){
        $price_presets=PricePreset::all();
        return $price_presets;
    }

    public function destroy($id){
        $pricePreset= PricePreset::find($id);

        $pricePreset->delete();

        return response()->json([
            "success" => "ok"
        ], 200);

    }

}
