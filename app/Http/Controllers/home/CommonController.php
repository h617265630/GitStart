<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Model\Nav;
use App\Http\Model\Link;
use App\Http\Model\Good;
use App\Http\Model\ItemInCart;
use Illuminate\Support\Facades\View;
use DB;
class CommonController extends Controller
{
    public function __construct()
    {
        $totalprice = 0;
        $msg = "";
        $countitem=0;
        if (session('user')){

            $sql ='select * from good inner join itemincart on good.id=itemincart.goodNo and itemincart.userno=?';
            $itemInCart=DB::select($sql,[session('user')['id']]);
            for($i=0;$i<count($itemInCart);$i++)
            {
                $totalprice+=$itemInCart[$i]->goodQuantity*$itemInCart[$i]->listprice;
            }
            if (count($itemInCart) > 0) {
            } else {
                $msg = "There is no item in your cart,try add new";
            }
            foreach($itemInCart as $i) {
                $countitem = $countitem + $i->goodQuantity;
            }
        }
        else
        {
            $itemInCart=[];
        }
        View::share('cartgood',$itemInCart);
        View::share('countitem',$countitem);
        View::share('totalprice',$totalprice);
        $nav = Nav::all();
        $link = Link::all();
        View::share('msg', $msg);
        View::share('nav', $nav);
        View::share('link', $link);
    }
}
