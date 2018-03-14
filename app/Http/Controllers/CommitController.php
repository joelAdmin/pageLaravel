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
	        		$commits = NoticeModel::getCommit()->orderBy('id_com', 'desc')->get();
        			$answers = NoticeModel::getAnswer()->orderBy('id_ans', 'desc')->get();
        			if (isset($inputs['modal']) && ($inputs['modal']=true)) {

        				return view("front.ajax.commitModal", ['commits' => $commits, 'answers' => $answers, 'id_Not' => $id_not, 'page' => count($commits)]);
        			}else
        			{
        				return view("front.include.commit", ['commits' => $commits, 'answers' => $answers, 'id_Not' => $id_not]);
        			}        			
	        	}
	        } 		
    	//}
    }

    public function getNewAnswer($id)
    {
    	if (Request::ajax()) 
    	{
    		return view('front.ajax.newAnswer', ['id_com' => $id]);
    	}
    }

    public function getNewAnswerModal($id)
    {
    	if (Request::ajax()) 
    	{
    		return view('front.ajax.newAnswerModal', ['id_com' => $id]);
    	}
    }

    
    public function viewCommits($id)
    {
    	if (Request::ajax()) 
    	{
    		$commits = NoticeModel::getCommit()->orderBy('id_com', 'desc')->get();
        	$answers = NoticeModel::getAnswer()->orderBy('id_ans', 'desc')->get();
	       	return view("front.ajax.commitModal", ['commits' => $commits, 'answers' => $answers, 'id_Not' => $id, 'page' => count($commits)]);
    	}
    }
}
