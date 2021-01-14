<?php

namespace App\Models;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='Employee';
    public $fillable = ['email', 'password', 'address','city',''];

//database se fetch kare hue data mai  modification krane ko accessors
    function getemailAttribute($value){
        return ucfirst($value);
    }
    function getaddressAttribute($value){
        return $value.',india'.',test';
    }
//Mutator

public function setNameAttribute($value){
    return $this->attributes['Name']='Mr.'.$value;
    }
public function setemailAttribute($value){
return $this->attributes['email']=$value.'@gmail.com';
}
public function setaddressAttribute($value){
    return $this->attributes['address']=$value.'India';
    }
public function setcityAttribute($value){
        return $this->attributes['city']=$value.'.';
        }


//
function onetoone(){
    return $this->hasOne(Company::class,'user_id','id');
}




}
