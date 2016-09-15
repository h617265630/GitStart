<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table="userinfo";
    protected $primaryKey='info_id';
    public $timestamps=false;
    protected $guarded=[];

    public static $rules = array(
        'userNo'=>'required',
        'address'=>'required',
        'phone'=>'required',
        'username'=>'required',
        'email'=>'required'
    );
}
