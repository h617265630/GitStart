<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $table="good";
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

    public static $rules = array(
        'good_name' => 'required',
        'good_title' => 'required',
        'priceforsale'=>'required',
    );
}
