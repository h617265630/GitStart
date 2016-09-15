<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Auth\PasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Model\Login;

class LoginController extends CommonController
{
    public function login()
    {
        $input = Input::except('_token');
        if($input)
        {
             $v = Validator::make($input,Login::$rules);
            if($v->passes())
            {
                $login= Login::all()->toArray();
                foreach($login as $l)
                {
                    if($input['username'] != $l['username']||$input['password'] != Crypt::decrypt($l['password']))
                    {
                        $str="Email or password is wrong ,please try again!";
                        return back()->withErrors($str); 
                    }
                    else
                    {
                        session(['user' => $l]);
                        return Redirect('admin/index');
                    }
                }
            }
            else
            {
                return back()->withErrors($v);
            }
        }
        else
        {
            return view('admin.login');
        }
    }

    public function logout()
    {
        session(['user'=>null]);
        return back();
    }
}
