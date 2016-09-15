<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="category";
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

    public static $rules = array(
        'cate_name' => 'required|max:50',
        'cate_title'=>'required|max:255'
    );
}
