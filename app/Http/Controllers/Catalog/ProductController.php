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
        $products=Product::with('prices','checkinProducts','productCategory','inventories')->get();

        return $products->toArray();
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
            $exploded=explode(',',$request->image);
            $decoded=base64_decode($exploded[1]);

            if(str_contains($exploded[0],'jpeg')){
                $extension='jpg';
            }
            else{
                $extension='png';   
            }
            $filename=str_random().'.'.$extension;
            $path=public_path().'/uploadedImages/'.$filename;
            file_put_contents($path,$decoded);
            
            $product=Product::create($request->only(['name','symbol','sku','product_category_id',
                                    'strain','is_marijuana','product_type_id',
                                    'is_each','net_weight','is_self_distributed',
                                    'is_lab_results','is_show_on_weedmaps','is_show_on_potify',
                                    'is_print_label','description','price_measurement'])+['image'=>$filename]);

            return $product;
    }


    public function upload(Request $request)
    {
    //     if(!$request->hasFile('file'))
    //     return response()->json([
    //         'error' => 'No File Uploaded'
    //     ]);

    // $file = $request->file('file');

    // if(!$file->isValid())
    //     return response()->json([
    //         'error' => 'File is not valid!'
    //     ]);;

        if ( $files =  $request->file('file')) {
            foreach ($request->file('file') as $key => $file) {
                $name = time() . $key . $file->getClientOriginalName();
                $filename = $file->move('files', $name);
    
            }
        }

    return response()->json([
        'success' => "ok"
    ]);
    
    }

    public function deleteImage(Upload $upload)
    {
        if (!(empty($upload->file))) {
            if (file_exists(public_path() . '/files/' . $upload->file)) {
                unlink(public_path() . '/files/' . $upload->file);
            }
            Upload::where('id', $upload->id)->delete();
        }
        return response()->json(null, 204);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::with('tags','labResults','prices','weedMapPrices','productCategory','inventories')->find($id);

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
