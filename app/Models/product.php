<?php

namespace App\Models;

use App\Models\image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;

    protected $fillable=["name","price","sale","quntity","cteogry"];

    public function images(){
        return $this->hasMany(image::class,"product_id","id");
    }
}
