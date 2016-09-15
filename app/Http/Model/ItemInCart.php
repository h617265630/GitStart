<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class ItemInCart extends Model
{
    protected $table="itemInCart";
    protected $primaryKey='item_id';
    public $timestamps=false;
    protected $guarded=[];

    public static $rules = array(
        'userNo'=>'required',
        'orderTime'=>'required|max:11',
        'goodNo' => 'required|max:11',
    );
}
