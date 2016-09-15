<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    //
    protected $table="wishlist";
    protected $primaryKey='wishlist_id';
    public $timestamps=false;
    protected $guarded=[];

    public static $rules = array(
        'userNo'=>'required',
        'goodNo'=>'required'
    );
}
