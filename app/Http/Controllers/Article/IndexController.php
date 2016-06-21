<?php

namespace App\Http\Controllers\Article;

use App\Http\Model\Articles;
use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function index(){
        if ($input = Input::get()){
            dd($input);
        }
        $list = Articles::orderBy('id','desc')->paginate(2);
        return view('articles.index',compact('list'));
    }
    

    public function insert(){
        if ($input = Input::all()){
            dd($input);
        }
        /*$articles = Articles::find(1);
        $articles->title = '青龙';
        $articles->update();
        dd($articles);*/
        return view('articles.add');
    }

    public function pass(){
        if ($input = Input::all()){
            $rull=[
                'password0'=>'required',
                'password'=>'required|between:6,20|confirmed',
                'password_confirmation'=>'required',
            ];
            $message=[
                'password0.required'=>'旧密码不能为空',
                'password.required'=>'密码不能为空',
                'password.between'=>'密码6-20位',
                'password.confirmed'=>'密码不匹配',
                'password_confirmation.required'=>'密码不能为空',
            ];
            $validatator = Validator::make($input,$rull,$message);
            if ($validatator->passes()){
                $user= User::first();
                $_password = Crypt::decrypt($user->password);
                if ($input['password0'] == $_password){
                    $user->password = Crypt::encrypt($input['password']);
                    $user->update();
                    return redirect('article/index');
                }else{
                    return back()->with('errors','原密码错误');
                }

            }else{
                return back()->withErrors($validatator);
                //dd($validatator->errors()->all());
            }
        }
        return view('articles.pass');

    }
}








?>