<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Model\Config;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ConfigController extends Controller
{
    public function index()
    {
        $data = Config::orderBy('id', 'asc')->get();
        foreach ($data as $k => $v){
            switch($v->field_type)
            {
                case 'input':
                    $data[$k]->_html = '<input type="text" class="lg" name="conf_content[]" value="'.$v->conf_content.'">';
                    break;
                case 'textarea':
                    $data[$k]->_html = '<textarea type="text" name="conf_content[]">'.$v->conf_content.'</textarea>';
                    break;
                case 'radio':
                    $arr = explode(',',$v->field_value);
                    $str = ' ';
                    foreach($arr as $m=>$n)
                    {
                        $r = explode('|',$n);
                        //$c = $v->conf_content == $r[0]?' checked ':'';
                        $c=" checked ";
                        $str.= '<input type="radio" name="conf_content[]" value="'.$r[0].'" '.$c.'>'.$r[1];
                    }
                    $data[$k]->_html=$str;
                    break;
            }
        }

        return view('admin.config.list')->withConfigs($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.config.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Input::except('_token');
        $v =Validator::make($input,Config::$rules);
        if($v->passes())
        {
            $re = Config::create($input);
            if($re)
            {
                return Redirect('admin/config');
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
        $config = Config::find($id);
        return view('admin.config.edit',compact('config'));
    }

    public function update($id)
    {
        $input = Input::except('_token','_method');

        $v = Validator::make($input,Config::$rules);
        if($v->passes())
        {
            $re = Config::where('id','=',$id)->update($input);
            if($re)
            {
                return redirect('admin/config');
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
        $re = Config::where('id','=',$id)->delete();
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
    public function changeContent()
    {
        $input = Input::all();
        foreach($input['id'] as $k=>$v)
        {
            Config::where('id','=',$v)->update(['conf_content'=>$input['conf_content'][$k]]);
        }
        return back()->with('errors','config successful');
    }
    public function putfile()
    {
        $config = Config::pluck('conf_content','conf_title');
        $str = '<?php return '.var_export($config,true).';';
        $path = base_path().'\config\web.php';
        file_put_contents($path,$str);
    }
}
