<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use App\models\CommitModel;
use App\models\NoticeModel;

class CommitController extends Controller
{
    public function store()
    {
    	//if (Request::ajax()) {
    		$inputs = Request::all();
    		$id_not = $inputs['id']; //solo en este caso uso como prefijo el id por usar multiples lformularios
    		$request = ["commit" => $inputs["commit_$id_not"]]; //le coloco el name del campo de la tabla db para usa cargas masivas co create()
    		$rules = [ "commit_$id_not"=>"required"]; 
    		$validator = Validator::make($inputs, $rules);
	        if($validator->fails()) 
	        { 
	           return array('fail' => true, 'errors' => $validator->getMessageBag()->toArray()); 
	        }else
	        {
	        	$id = CommitModel::create($request)->id;
	        	if ($id) 
	        	{
	        		$find_commit = CommitModel::find($id);
	        		$pivot = $find_commit->notices_users()->attach($id_not, ['id_use' => \Auth::User()->id]);
	        		$commits = NoticeModel::getCommit()->orderBy('id_com', 'desc')->where('id_not', '=', $id_not)->get();
	        		$answers = NoticeModel::getAnswer()->orderBy('id_ans', 'desc')->get();
	        		return view("front.ajax.03.commits", ['commits' => $commits, 'answers' => $answers]);
	        		//return array('html' => , 'id_not' => $id_not, 'commit' => $find_commit->commit, 'user' => \Auth::User()->name);	
	        	}
	        } 		
    /*	}else
    	{
    		//return $id_Not;
    		$inputs = Request::all();
    		dd($inputs);
    	}*/
    }

    public function getNewAnswer($id)
    {
    	if (Request::ajax()) 
    	{
    		return view('front.ajax.03.newAnswer', ['id_not' => $id]);
    	}
    }
}
