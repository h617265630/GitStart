<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Model\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
class UserController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        if ($input=Input::except('_token')) {
            $rules= ['username'=>'required|max:255',
        'password'=>'required|max:255|min:6'];
            $v = Validator::make($input,$rules);
            if ($v->passes()) {
                $user = User::all();
                foreach ($user as $u) {
                    if ($input['username'] == $u->username && $input['password'] == $u->password) {
                        session(['user' => $u]);
                        return Redirect('/');
                    }
                }
                return back()->withErrors('password or username are not correct');
            } else {
                return back()->withErrors($v);
            }
        }
        else
        {
            return view('home.login');
        }
    }
    public function signup()
    {
        if($input=Input::except('_token'))
        {
            $v=Validator::make($input,User::$rules);
            if($v->passes())
            {
                if($input['confirmpassword']==$input['password'])
                {
                    //save to database;
                    $input=Input::except('_token','confirmpassword');
                    $user = User::create($input);
                    if($user)
                    {
                        $user->cartNo=$user->id;
                        $user->update();
                        return Redirect('/');
                    }
                    else{
                        return back()->with('errors','Fail to fill in data,please try again later');
                    }
                }
                else
                {
                    return back()->withErrors('two password are not same');
                }
            }
            else
            {
                return back()->withErrors($v);
            }
        }
        else
        {
            return view('home.signup');
        }

    }
    public function logout()
    {
        session(['user'=>null]);
        return Redirect('/');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
