<?php

namespace App\Models;

use App\Models\admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class admin_type extends Model
{
    use HasFactory;

    protected $hidden=[
        'created_at','updated_at'
    ];
    protected $fillable=["admin_id","prive","permission"];

    public function getPermissionAttribute($value){
        return explode("+",$value);
    }

    public function setPermissionAttribute($value){
        return $this->attribute["permission"]=implode("+",$value);
    }

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

    public static function data_update($req,$id){
        $admin_type=$req->only("prive","permission");
        $admin_type["permission"]=implode("+",$admin_type["permission"]);
        admin_type::where("admin_id",$id)->update($admin_type);
    }
}
