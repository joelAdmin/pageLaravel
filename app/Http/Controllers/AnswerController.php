<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use App\models\AnswerModel;
use App\models\NoticeModel;

class AnswerController extends Controller
{
    public function store()
    {
    	$inputs = Request::all();
    	$id = $inputs['id']; //solo en este caso uso como prefijo el id por usar multiples lformularios
    	$request = ["commit" => $inputs["commit_$id"]]; //le coloco el name del campo de la tabla db para usa cargas masivasco create()
    	$rules = [ "commit_$id"=>"required"]; 
    	$validator = Validator::make($inputs, $rules);
	    if($validator->fails()) 
	    { 
	          return array('fail' => true, 'errors' => $validator->getMessageBag()->toArray()); 
	    }else
	    {
	       $result = AnswerModel::create($request)->id;
	       if ($result) 
	       {
	       	  $find_answer = AnswerModel::find($result);
	       	  //dd($find_answer);
	       	  $pivot = $find_answer->commits_users()->attach($id, ['id_use' => \Auth::User()->id]);
	       	  $answers = NoticeModel::getAnswer()->orderBy('id_ans', 'desc')->where('id_com', '=', $id)->get();
	       	  return view("front.ajax.03.answers", ['answers' => $answers]);
	       }
	    }
    }
}
