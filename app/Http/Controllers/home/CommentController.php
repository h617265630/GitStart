<?php

namespace App\Http\Controllers\home;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Model\Comment;
use App\Http\Requests;

class CommentController extends CommonController
{
    public function show($id)
    {
        echo "show";
    }

    public function store()
    {
        $input = Input::except('_token');
        $v =Validator::make($input,Comment::$rules);
        if($v->passes())
        {
            $re=Comment::create($input);
            if($re)
            {
                return back();
            }
            else{
                return back()->with('errors','Fail to fill in data,please try again later');
            }
        }
        else {
            return back()->withErrors($v);
        }
    }
}
