<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 5/09/2016
 * Time: 11:55 PM
 */

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table="payments";
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

    public static $rules = array(
        'failed'=>'required',
        'transaction_id'=>'required'
    );
}
