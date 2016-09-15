<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Auth\PasswordController;
use Illuminate\Http\Request;
use App\Http\Model\Category;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
class CategoryController extends CommonController
{
    public function index()
    {
        $cates = Category::orderBy('id','asc')->paginate(3);
      return view('admin.category.list',compact('cates'));
    }

    public function show()
    {
        return "show";
    }

    public function create()
    {
        return view('admin.category.add');
    }

    public function store()
    {
        $input = Input::except('_token');
        $v =Validator::make($input,Category::$rules);
        if($v->passes())
        {
            $re = Category::create($input);
            if($re)
            {
                return Redirect('admin/cate');
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
        $cat = Category::find($id);
        return view('admin.category.edit',compact('cat'));
    }

    public function update($id)
    {
        $input = Input::except('_token','_method');

        $v = Validator::make($input,Category::$rules);
        if($v->passes())
        {
            $re = Category::where('id','=',$id)->update($input);
            if($re)
            {
                return redirect('admin/cate');
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
        $re = Category::where('id','=',$id)->delete();
        Category::where('cate_pid',$id)->update(['cate_pid'=>0]);
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
