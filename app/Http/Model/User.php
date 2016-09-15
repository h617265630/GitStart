<?php

namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table="user";
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

    public static $rules = array(
        'username'=>'required|max:255|unique.user',
        'email'=>'email|required|unique:user',
        'password'=>'required|max:255|min:6'
    );
}
