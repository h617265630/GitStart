<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    protected $table="nav";
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

    public static $rules = array(
        'nav_name'=>'required|max:50',
        'nav_alias'=>'required|max:50',
        'nav_url'=>'required|max:255',
    );
}
