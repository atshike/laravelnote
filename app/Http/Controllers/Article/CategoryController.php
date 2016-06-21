<?php

namespace App\Http\Controllers\Article;

use App\Http\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class CategoryController extends Controller
{
    //
    public function index(){
        $categorys=Category::all();
        $data = $this->getTree($categorys,'name','id','pid');
        return view('articles.cateindex')->with('date',$data);
    }

    public function getTree($data,$field_name,$field_id='id',$field_pid='pid',$pid=0){
        $arr = array();
        foreach ($data as $k=>$v){
            if ($v->$field_pid==$pid){
                $data[$k]["_".$field_name]=$data[$k][$field_name];
                $arr[] = $data[$k];
                foreach ($data as $m=>$n){
                    if ($n->$field_pid == $v->$field_id){
                        $data[$m]["_".$field_name] = '├─'.$data[$m][$field_name];
                        $arr[] = $data[$m];
                    }
                }
            }
        }
        return $arr;

    }




























}
