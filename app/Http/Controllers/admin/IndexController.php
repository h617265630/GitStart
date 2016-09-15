<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests;

class IndexController extends CommonController
{
    
    public function index()
    {
        return view('admin.home');
    }
}
