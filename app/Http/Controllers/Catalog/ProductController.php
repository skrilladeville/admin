<?php

namespace App\Http\Controllers\Catalog;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();

        return $products;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
            $product=Product::create($request->only(['name','symbol','sku','product_category_id',
                                    'strain','is_marijuana','image','product_type_id',
                                    'is_each','net_weight','is_self_distributed',
                                    'is_lab_results','is_show_on_weedmaps','is_show_on_potify',
                                    'is_print_label','description','price_measurement']));

            return $product;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::with('tags','labResults','prices','weedMapPrices')->find($id);

        return $product->toArray();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function archieve($id)
    {
        $product=Product::find($id);
        $product->is_archieve=true;
        $product->save();
        return response()->json([
            "success" => "ok"
        ], 200);
    }

    public function unarchieve($id)
    {
        $product=Product::find($id);
        $product->is_archieve=false;
        $product->save();
        return response()->json([
            "success" => "ok"
        ], 200);
    }

}
