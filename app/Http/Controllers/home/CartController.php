<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\Nav;
use App\Http\Model\Link;
use App\Http\Model\Good;
use App\Http\Model\WishList;
use App\Http\Model\ItemInCart;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
use DB;
class CartController extends CommonController
{
    public function index()
    {
            $sql3 ='select * from good inner join itemincart on good.id=itemincart.goodNo and itemincart.userno=?';
            $itemInCart=DB::select($sql3,[session('user')['id']]);
            $error="";
            if(count($itemInCart)<1) {
                $error = "There is no item in your cart,try add new";
            }
            return view('home.cart',compact('error','itemInCart'));
    }
    
    public function addtocart($id)
    {
        if(!session('user')){
            $data=['status'=>2];
            return $data;
        }
        else{
            $good=Good::find($id);
            $item=ItemInCart::where('userNo','=',session('user')['id'])->where('goodNo','=',$id)->get();
            if(count($item)>0)
            {
                if($input=Input::all())
                {
                    $item->first()->goodQuantity+=$input['quantity'];
                }
                else
                {
                    $item->first()->goodQuantity+=1;
                }
                $item->first()->status=0;
                $item->first()->update();
            }
            else
            {
                $item = new ItemInCart;
                $item->userNo = session('user')['id'];
                $item->orderTime = date('y-m-d\H:i:s');
                $item->goodNo = $id;
                $item->goodQuantity += 1;
                $item->status = false;
                $item->save();

            }
            //zhoa doa good ranhou jia ru order,ran hou
            $data=['status'=>1,'msg'=>$good];
            return $data;
        }
    }
    public function updatecart()
    {
        $input = Input::all();
        foreach($input['id'] as $k=>$v)
        {
            ItemInCart::where('item_id','=',$v)->update(['goodQuantity'=>$input['goodQuantity'][$k]]);
        }
        return back();
    }
    public function remove($id)
    {
        $itemincart=ItemInCart::where('userNo','=',session('user')['id'])->where('goodNo','=',$id)->get();
        $itemincart->first()->delete();
        return back();
    }
    public function clearcart()
    {
        $itemincart=ItemInCart::where('userNo','=',session('user')['id'])->get();
        foreach($itemincart as $item)
        {
            $item->delete();
        }
        return back();
    }
    public function test()
    {
        $good=Good::find(2);
        $item=WishList::where('userNo','=',session('user')['id'])->where('goodNo','=',2)->get();
        if(count($item)>0)
        {
            $item->first()->goodQuantity+=1;
            $item->first()->update();
        }
        else
        {
            $item = new WishList;
            $item->userNo = session('user')['id'];
            $item->goodNo = 2;
            $item->goodQuantity += 1;
            $item->save();

        }
        //zhoa doa good ranhou jia ru order,ran hou
        $data=['status'=>1,'msg'=>$good];
        return $data;
    }
    public function update($id)
    {
        if(session('user')) {
            $item = ItemInCart::where('userNo', '=', session('user')['id'])->where('goodNo', '=', $id)->get();
            if (count($item) > 0) {
                if ($input = Input::all()) {
                    $item->first()->goodQuantity += $input['quantity'];
                } else {
                    $item->first()->goodQuantity += 1;
                }
                $item->first()->status = 0;
                $item->first()->update();
            } else {
                $item = new ItemInCart;
                $item->userNo = session('user')['id'];
                $item->orderTime = date('y-m-d\H:i:s');
                $item->goodNo = $id;
                $item->goodQuantity += 1;
                $item->status = false;
                $item->save();
            }
            return back();
        }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
        else{
            return back()->withError('you need login first to do further process');
        }
    }
    public function show($id)
    {

    }
}
