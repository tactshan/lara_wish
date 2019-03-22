<?php

namespace App\Http\Controllers;

use App\Model\WishModel;
use Illuminate\Http\Request;

class WishController extends Controller
{
    //
    public function wishView()
    {
        $data=WishModel::all();
        $info=[
          'data'=>$data
        ];
        return view('wish.wish',$info);
    }

    public function wish_data(Request $request)
    {
        $name = $request->input('username');
        $content = $request->input('content');
        $data=[
          'w_name'=>$name,
            'w_content'=>$content,
            'w_time'=>time()
        ];
        $res=WishModel::insertGetId($data);
        if($res){
            echo 1;
        }else{
            echo "登录失败";
        }
    }
}
