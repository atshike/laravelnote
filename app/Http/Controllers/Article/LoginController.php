<?php

namespace App\Http\Controllers\Article;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

require_once 'resources/code/Code.class.php';

class LoginController extends Controller
{
    //
    public function login(){
        if ($input = Input::all()){
            $code = new \Code;
            $_code = $code->get();
            if (strtoupper($input['code'])!==$_code){
                return back()->with('msg','验证码错误');
            }
            $user = User::first();
            if ($user->name != $input['user_name'] || Crypt::decrypt($user->password)!=$input['user_pass']){
                return back()->with('msg','用户名密码错误');
            }
            session(['user'=>$user]);
            //dd(session('user'));
            return redirect('article/index');
        }else{
            return view('articles.login');
        }
    }

    public function code(){

        $code = new \Code();
        $code->make();
        /*$str = '123456';

        $str1 = 'eyJpdiI6Iko4aldOWmp0MGdORzVMR2FvZ3NMZ2c9PSIsInZhbHVlIjoiRXJrZ2hPR1k0c2JNUmVtdU1PK3VFdz09IiwibWFjIjoiZTBlYzgxNGVhM2I4ZjNiYzFmOTcxZDEyZGU5MTFhZTRlMDBiN2ViOWU1NTNhYTY2MzM2MzRjZjYyOTNmM2RmZSJ9';
        echo Crypt::encrypt($str);
        echo '<br />';
        echo Crypt::decrypt($str1);
        */

    }










}
