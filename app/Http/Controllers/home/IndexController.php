<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Model\Good;
use App\Http\Model\Comment;
use App\Http\Model\UserInfo;
use Illuminate\Support\Facades\Input;
use Braintree_Gateway;
use DB;
class IndexController extends CommonController
{
    public function index()
    {
        //fetch date then return to the index page;
        //feature product
        $feature = Good::all()->take(8);
        $new = Good::orderBy('dateFrom', 'desc')->take(8)->get();
        $sale = Good::orderBy('priceforsale', 'desc')->take(8)->get();
        $alert="";
        return view('home.index', compact('feature', 'new', 'sale', 'nav', 'link','alert'));
    }
    


    public function about()
    {
        return view('home.about', compact('nav', 'link'));
    }

    public function myaccount()
    {
        return view('home.account', compact('nav', 'link'));
    }
    public function showitem($id)
    {
        $good = Good::find($id);
        $comments=Comment::where('good_id',$id)->get();
        $pricerate=DB::table('comment')->where('good_id',$id)->avg('price');
        $valuerate=DB::table('comment')->where('good_id',$id)->avg('value');
        $qualityrate=DB::table('comment')->where('good_id',$id)->avg('quality');
        return view('home.productContent', compact('good','nav','link','comments','pricerate','valuerate','qualityrate'));
    }

    public function checkout()
    {
        $gateway = new Braintree_Gateway(array(
            'accessToken' => 'access_token$sandbox$rzmtygw3d34hkh7y$21a4218c37376454300e886348e79ff3',
        ));

        $clientToken = $gateway->clientToken()->generate();
        $userinfo=UserInfo::where('userNo',session('user')['id'])->get();
        return view('home.checkout', compact('nav', 'link','cartgood','totalprice','userinfo','clientToken'));
    }

    public function categrid()
    {
        $good = Good::paginate(6);
        $listgood = Good::paginate(6);
        return view('home.shop_grid', compact('good', 'nav', 'link','listgood'));
    }
    public function search()
    {
        $input = Input::except('_token');
        $listgood = Good::where('good_name', 'LIKE', '%' . $input['search'] . '%')->paginate(6);
        $good=$listgood;
        return view('home.shop_grid',compact('listgood','good'));
    }
    public function quickview($id)
    {
        $good=Good::find($id);
        $data=['img'=>$good['good_img'],'good_name'=>$good['good_name'],'good_content'=>$good['good_content'],'listprice'=>$good['listprice'],'id'=>$id];
        return $data;
    }
}
