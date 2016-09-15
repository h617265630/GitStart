<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table="comment";
    protected $primaryKey='comment_id';
    public $timestamps=false;
    protected $guarded=[];

    public static $rules = array(
        'name' => 'required',
        'review' => 'required',
        'price'=>'required',
        'value'=>'required',
        'quality'=>'required'
    );
}
