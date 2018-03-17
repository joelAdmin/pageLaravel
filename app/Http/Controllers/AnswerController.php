<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use App\models\AnswerModel;
use App\models\NoticeModel;
use App\models\CommitModel;

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
	       	  $pivot = $find_answer->commits_users()->attach($id, ['id_use' => \Auth::User()->id]);
	       	  $answers = NoticeModel::getAnswer()->orderBy('id_ans', 'desc')->get();
	       	  if (isset($inputs['modal']) && ($inputs['modal']=true)) 
	       	  {
	       	  	return view("front.include.answers", ['answers' => $answers, 'id_com' => $id, 'page_asnwer' => count(NoticeModel::getAnswer()->orderBy('id_ans', 'desc')->where('id_com', '=', $id)->get())]);
	       	  }else
	       	  {
	       	  	return view("front.include.answers", ['answers' => $answers, 'id_com' => $id]);
	       	  }
	       }
	    }
    }

    public function viewAnswers($id)
    {
    	if (Request::ajax()) {
    		
        	$answers = NoticeModel::getAnswer()->where('id_com', '=', $id)->orderBy('id_ans', 'desc')->get();
        	$commit = NoticeModel::getCommit()->where('id_com', '=', $id)->orderBy('id_com', 'desc')->get()[0];
	       	return view("front.ajax.answerModal", ['answers' => $answers, 'id_com' => $id, 'commit' => $commit]);
    	}
    }
}
