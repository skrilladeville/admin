<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\TaxTier;
use App\TaxRate;
use App\ShipmentTax;
use App\TaxSetting;

class TaxController extends Controller
{
    public function index(){

    }

    public function getTaxTiers(){
        $tiers['tiers']= TaxTier::all();
        $tiers["settings"] = TaxSetting::all()->first();
        return $tiers;
    }

    public function getTaxRates($id){
        $tier = TaxTier::find($id);
        $tier['rates'] = $tier->rates;
        return $tier;
    }

    public function newTaxTier(Request $request){
        $tax_tier = TaxTier::create(array('name'=>$request->name));
        $tax_tier->rates()->sync($request->rates);
    }

    public function editTaxTier(Request $request, $id){
        $tax_tier = TaxTier::find($id);
        $tax_tier->update(array('name'=> $request->name));
        $tax_tier->rates()->sync($request->rates);
    }

    public function deleteTaxTier($id){
        $tier = TaxTier::find($id);
        $tier->delete();
    }

    public function getShipmentTax(){
        $tier = ShipmentTax::all('province', 'type','rate')
        ->groupBy('province');
        return $tier;
    }

    public function updateShipmentTax(Request $request){
         $data = $request->all();
        foreach($data as $key => $value){
            
            $tier = ShipmentTax::where('province', '=', $value["province"])
                                ->where('type', '=', $value["type"])
                                ->first();
            $tier->rate = $value["rate"];
            $tier->save();
        }
    }

    public function updateTaxSettings(Request $request){
        $setting = TaxSetting::all()->first();        
        foreach($request->except('_token') as $key => $value){
            $setting->update(array($key => $value));           
        }
    }
}
