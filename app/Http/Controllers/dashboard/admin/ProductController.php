<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Models\image;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Traits\sameData;
use App\Http\Traits\updateProduct;

class ProductController extends Controller
{
    use sameData,updateProduct;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_product=product::with("images")->get();
        return view('dashboard.product.view',compact("data_product"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.product.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {


        DB::beginTransaction();
        try{
            $ptoduct=$request->except('img');
            $images=$request->only('img');
            $data=product::create($ptoduct);
            $product_id=$data->id;
            image::save_image($product_id,$images);
            DB::commit();
            return redirect()->route('product.index')->with('ms_admin',"the product has been added successfuly");
        }catch(EXCEPTION $e){
            DB::rollback();
            return redirect()->route('product.index')->with('ms_admin',"an error occured");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=product::findOrfail($id);
        return view('dashboard.product.edite',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(!$request->hasFile("img")){
            return  $this->sameData($request,$id);
        }else{
             
            return  $this->updateProduct($request,$id);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $img=image::where("product_id",$id)->get();
        image::deleteImage($img);
        product::findOrfail($id)->delete();
        return redirect()->route('product.index')->with('ms_admin',"the product has been deleted successfly");

    }
}
