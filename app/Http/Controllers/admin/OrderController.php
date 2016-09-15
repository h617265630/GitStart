<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Model\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(5);
        return view('admin.order.list')->withOrders($orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.order.add');
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
        $v =Validator::make($input,Order::$rules);
        if($v->passes())
        {
            $re = Order::create($input);
            if($re)
            {
                return Redirect('admin/order');
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
        $order = Order::find($id);
        return view('admin.order.edit',compact('order'));
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

        $v = Validator::make($input,Order::$rules);
        if($v->passes())
        {
            $re = Order::where('id','=',$id)->update($input);
            if($re)
            {
                return redirect('admin/order');
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
        $re = Order::where('id','=',$id)->delete();
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
