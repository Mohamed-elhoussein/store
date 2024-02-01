<?php
namespace App\Http\Traits;
use App\Models\product;
use App\Models\image;
trait updateProduct{
public function updateProduct($request,$id){
    if($request->hasFile("img")){
        product::where("id",$id)->update($request->except('img',"_method","_token"));
        $img=image::where("product_id",$id)->get();
        image::where("product_id",$id)->delete();
        image::deleteImage($img);
        image::save_image($id,$request->only("img"));
        return redirect()->route('product.index');

    }

}

}
