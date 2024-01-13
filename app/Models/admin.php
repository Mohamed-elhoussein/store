<?php

namespace App\Models;

use App\Models\admin_type;
use Illuminate\Auth\Access\Gate;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable=["name","email","password","gender"];
    protected $hidden=['created_at',"updated_at","password"];


    public function setPasswordAttribute($password){
    $this->attributes['password'] = Hash::make($password);
    }

    public function permission(){
        return $this->hasOne(admin_type::class,"admin_id","id");
    }

    public static function permission_type(){
        $admin_id=Auth::guard('admin')->user()->id;
        return $admin_permissions= admin::findOrfail($admin_id)->permission->permission;

    }




    public function HasAbilty($array_permission){
        $role=$this->permission_type();
        foreach($role as $role){
        return   $role==$array_permission?"true":"false";

        }
    }

}
