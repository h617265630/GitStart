<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table="admin";
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

    public static $rules = array(
        'username' => 'required|email',
        'password' => 'required'
    );
}
