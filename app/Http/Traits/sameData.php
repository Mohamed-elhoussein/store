<?php
namespace App\Http\Traits;
use App\Models\product;
trait sameData{
public  function sameData($request,$id){

        $check=product::where([
            "id"=>$id,
            "name"=>$request->name,
            "price"=>$request->price,
            "sale"=>$request->sale,
            "quntity"=>$request->quntity,
            "cteogry"=>$request->cteogry
        ])->first();
//       if check
        if($check){
            return redirect()->route('product.index');
        }else{
            product::where("id",$id)->update($request->except('img',"_method","_token"));
            return redirect()->route('product.index');

        }
//      end if check



    }
}



