<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Model\Link;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
class LinkController extends CommonController
{
    public function index()
    {
        $links = Link::orderBy('id','asc')->paginate(5);
        return view('admin.link.list',compact('links'));
    }

    public function show()
    {
        return "show";
    }

    public function create()
    {
        return view('admin.link.add');
    }

    public function store()
    {
        $input = Input::except('_token');
        $v =Validator::make($input,link::$rules);
        if($v->passes())
        {
            $re = link::create($input);
            if($re)
            {
                return Redirect('admin/link');
            }
            else{
                return back()->with('errors','Fail to fill in data,please try again later');
            }
        }
        else {
            return back()->withErrors($v);
        }
    }
    public function edit($id)
    {
        $link = link::find($id);
        return view('admin.link.edit',compact('link'));
    }

    public function update($id)
    {
        $input = Input::except('_token','_method');

        $v = Validator::make($input,link::$rules);
        if($v->passes())
        {
            $re = link::where('id','=',$id)->update($input);
            if($re)
            {
                return redirect('admin/link');
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

    public function destroy($id)
    {
        $re = link::where('id','=',$id)->delete();
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
