<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Model\WishList;
use App\Http\Model\Good;
class WishListController extends CommonController
{
    public function index()
    {
        $sql3 ='select * from good inner join wishlist on good.id=wishlist.goodNo and wishlist.userno=?';
        $wishlist=DB::select($sql3,[session('user')['id']]);
        return view('home.wishlist',compact('wishlist'));
    }
    public function create()
    {

    }
    public function store()
    {

    }
    public function addtowishlist($id)
    {
        if(!session('user')){
            $data=['status'=>0];
            return $data;
        }
        else{
            $good=Good::find($id);
            $item=WishList::where('userNo','=',session('user')['id'])->where('goodNo','=',$id)->get();
            if(count($item)>0)
            {
                $item->first()->goodQuantity+=1;
                $item->first()->update();
            }
            else
            {
                $item = new WishList;
                $item->userNo = session('user')['id'];
                $item->goodNo = $id;
                $item->goodQuantity = 1;
                $item->save();

            }
            $data=['status'=> 1 ,'msg'=>$good];
            return $data;
        }
    }
    public function removeWish($id)
    {
        $item=WishList::where('userNo','=',session('user')['id'])->where('goodNo','=',$id)->get();
        $item->first()->delete();
        return back();
    }
}
