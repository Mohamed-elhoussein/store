<?php

namespace App\Models;

use App\Models\admin_type;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class admin extends Model
{
    use HasFactory;
    protected $fillable=["name","email","password","gender"];


    public function setPasswordAttribute($password){
    $this->attributes['password'] = Hash::make($password);
    }

    public function permission(){
        return $this->hasOne(admin_type::class,"admin_id","id");
    }

}
