<?php

namespace App\Http\Controllers\home;
use App\Http\Model\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;

class UserInfoController extends CommonController
{
    public function show()
    {

    }
    public function store()
    {
        $input=Input::except('_token');
        $username=$input['lastname'].$input['firstname'];
        $address=$input['country'].','.$input['state'].','.$input['city'].','.$input['street'].','.$input['postcode'];
        $userinfo=new UserInfo;
        $userinfo->userNo=session('user')['id'];
        $userinfo->phone=$input['phone'];
        $userinfo->email=$input['email'];
        $userinfo->username=$username;
        $userinfo->address=$address;
        $userinfo->save();
        return back();
    }
}
