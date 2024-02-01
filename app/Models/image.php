<?php

namespace App\Models;

use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class image extends Model
{
    use HasFactory;
    protected $fillable=["product_id","image"];


    public function product(){
        return $this->belongsTo(product::class,"id","product_id");
    }

    public static function save_image($product_id,$images){
        foreach($images['img'] as $img){
            $img_name=md5(uniqid()).".".$img->extension();
            $data_img=image::create([
                "product_id"=>$product_id,
                "image"=>$img_name
            ]);
            $img->storeAs("public/images",$img_name);

        }
    }

    public static function deleteImage($img){
        foreach($img as $img){
            $file=$img["image"];
            unlink(storage_path('app/public/images/'.$file));
        }
    }
}
