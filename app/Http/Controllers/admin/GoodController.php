<?php

namespace App\Http\Controllers\admin;


use Illuminate\Http\Request;
use App\Http\Model\Good;
use App\Http\Model\Comment;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
class GoodController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods=Good::orderBy('id','desc')->paginate(3);
        return view('admin.good.list')->withGoods($goods);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.good.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $input = Input::except('_token');
        $v =Validator::make($input,Good::$rules);
        if($v->passes())
        {
            $re = Good::create($input);
            if($re)
            {
                return Redirect('admin/good');
            }
            else{
                return back()->with('errors','Fail to fill in data,please try again later');
            }
        }
        else {
            return back()->withErrors($v);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments=Comment::where('good_id',$id)->get();
        $pricerate=DB::select('select avg(price) from comment');
        $valuerate=DB::select('select avg(value) from comment');
        $qualityrate=DB::select('select avg(quality) from comment');
        return view('home.productContent', compact('good','nav','link','comments','pricerate','valuerate','qualityrate'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $good = Good::find($id);
        return view('admin.good.edit',compact('good'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = Input::except('_token','_method');

        $v = Validator::make($input,Good::$rules);
        if($v->passes())
        {
            $re = Good::where('id','=',$id)->update($input);
            if($re)
            {
                return redirect('admin/good');
            }
            else
            {
                return back()->withErrors('edit failed');
            }
        }
        else
        {
            return back()->withErrors($v);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $re = Good::where('id','=',$id)->delete();
        Good::where('cateNo',$id)->update(['cateNo'=>0]);
        if($re)
        {
            $data = ['status' =>0,'msg'=>'delete successed!',];
        }
        else
        {
            $data = ['status' =>1,'msg'=>'delete failed!',];
        }
        return $data;
    }
}
