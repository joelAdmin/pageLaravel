<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use App\User;

class UserController extends Controller
{
    public function index()
    {
    	return View::make('back.backNewUser');
    }

    public function store()
    {
        $user = new User();
        $request = Request::all();
    	$rules = [
    		'email'        => 'required|email|unique:users',
    		'user'         => 'required|unique:users',
    		'type'         => 'required|in:user,admin',
    		'password'     => 'required|min:6',
    		'confirmPassword' => 'required|min:6|same:password',
    	];
    	$validator = Validator::make($request, $rules);
    	if ($validator->fails()) {
    		return Redirect::to('/newUser')->withErrors($validator->errors())->withInput();
    	}else
    	{
            //$id = User::create($request)->id; no pude hacer asignacion masiva corregir
            $user->email = $request['email'];
            $user->user = $request['user'];
            $user->type = $request['type'];
            $user->password = $request['password'];
            $user->name = $request['name'];
            if ($user->save()) 
            {
               return Redirect::to('/newUser')->with('menssage_success', trans('message.success_save'));
            }
            /*else{return Redirect::to('/newUser')->with('menssage_danger', trans('message.danger_404'));}*/
    	}
    }

    public function getTableUser()
    {
        $user = User::paginate();
        //d($user);
        if ($user->count()>0) {
            return View::make('back.table.user')->with('users', $user);
        }else
        {
            return View::make('back.table.user')->with('user', $user);
        }
    }

    public function getUpdate($id)
    {
    	$user = User::find($id);
    	return view('back.form.updateUser', ['user' => $user]);
    }

    public function postUpdateUser()
    {
    	if(Request::ajax()){
      		$request = Request::all();
        	//$id = $request['id'];
            //$user = User::find($id);

        	$rules = [
    		'email'        => 'required|email|unique:users',
    		'user'         => 'required|unique:users',
    		'type'         => 'required|in:user,admin',
    		];

    		$validator = Validator::make($request, $rules);
    		if($validator->fails()) 
	        {
	        	return array('fail' => true, 'errors' => $validator->getMessageBag()->toArray()); 
	        }else
	        {
                //$banner->fill($request);
                /*
                $banner->title_ban = $request['title_ban'];
                $banner->content_ban = $request['content_ban'];
                
            	if($banner->save()) 
            	{
            		if(!empty($file)) 
		            {
                        //dd($file);
		                \Storage::disk('imgBanner')->put($filename,  \File::get($file));
		                return array('success' => true, 'message' => trans('message.success_update'), 'tr_id' => $id);
		            }else
		            {
		                return array('success' => true, 'message' => trans('message.danger_update'), 'tr_id' => $id);
		            }
            	}*/
	        }
    	}
    }
}
