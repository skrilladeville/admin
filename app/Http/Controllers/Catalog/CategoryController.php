<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use App\ProductCategory;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=ProductCategory::all();

        return response()->json([
            "categories" => $categories
        ], 200);

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
       $category= ProductCategory::create($request->only(["name","product_cat_id","description"]));
   
       return response()->json([
        "category" => $category
    ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category= ProductCategory::findOrFail($id);
        
        return response()->json([
            "category" => $category
        ], 200);
        
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
        $category=ProductCategory::find($id);

        $category->update($request->only(["name","product_cat_id","description"]));

        return response()->json([
            "category" => $category
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=ProductCategory::find($id);
        $category->delete();

        return response()->json([
            "success" => "ok"
        ], 200);

    }
}
