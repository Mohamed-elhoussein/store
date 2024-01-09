<?php

namespace App\Models;

use App\Models\admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class admin_type extends Model
{
    use HasFactory;
    protected $fillable=["admin_id","prive","permission"];

    public function admin(){
        return $this->belongsTo(admin::class,"id","admin_id");
    }


    public static function data_insert($admin_id,$admin_type){
        $permissions=implode("+",$admin_type["permission"]);
        admin_type::create([
            "admin_id"=>$admin_id,
            "permission"=>$permissions
        ]);
    }

}
