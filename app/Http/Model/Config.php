<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table="config";
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

    public static $rules = array(
        'conf_name'=>'required|max:50',
        'conf_title'=>'required|max:50',
        'field_type'=>'required|max:10'
    );
}

