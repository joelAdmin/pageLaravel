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
    private $user = null; 
    public function __construct()
    {
        $this->user = new User();
        return $this->user;
    }
    public function index()
    {
    	return View::make('back.backNewUser');
    }

    public function viewUserFront()
    {
       return View::make('front.form.newUser');
    }

    public function storeFront()
    {
        if (Request::ajax()) 
        {
            $request = Request::all();
            $rules = [
                'email'        => 'required|email|unique:users',
                'user'         => 'required|unique:users',
                'password'     => 'required|min:6',
                'confirmPassword' => 'required|min:6|same:password',
            ];
            $validator = Validator::make($request, $rules);
            if ($validator->fails()) 
            {
                return array('fail' => true, 'errors' => $validator->getMessageBag()->toArray());
            }else
            {
                $this->user->email = $request['email'];
                $this->user->user = $request['user'];
                $this->user->type = 'user';
                $this->user->password = \Hash::make($request['password']);
                $this->user->name = $request['name'];
                if($this->user->save()) 
                {
                    return array('success' => true, 'message' => trans('message.success_user'));
                }
            } 
        }
    }

    public function store()
    {
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
            $this->user->email = $request['email'];
            $this->user->user = $request['user'];
            $this->user->type = $request['type'];
            $this->user->password = \Hash::make($request['password']);
            $this->user->name = $request['name'];
            if ($this->user->save()) 
            {
               return Redirect::to('/newUser')->with('menssage_success', trans('message.success_save'));
            }
            /*else{return Redirect::to('/newUser')->with('menssage_danger', trans('message.danger_404'));}*/
    	}
    }

    public function getTableUser()
    {
        $user = User::paginate();
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
    	if(Request::ajax())
        {
      		$request = Request::all();

        	$id = (int) $request['id'];
            $user = User::find($id);
        	$rules = [
    			'email' => ['required', 'email', 'max:255', 'unique:users,email,'.$id.''],
    			'user'  => 'required|unique:users,user,'.$id.'',
    			'type'  => 'required|in:user,admin',
    		];
    		$validator = Validator::make($request, $rules);
    		if($validator->fails()) 
	        {
	        	return array('fail' => true, 'errors' => $validator->getMessageBag()->toArray()); 
	        }else
	        {
                $user->fill($request);
                //dd($user->fill($request));
            	if($user->save()) 
            	{
            		return array('success' => true, 'message' => trans('message.success_update'), 'tr_id' => $id);
            	}
	        }
    	}
    }

    public function destroy($id)
    {
      $user  = User::find($id);
      $user->delete();
      return array('success' => true, 'message' => trans('message.success_update'), 'tr_id' => $id);
    }

    public function restore($id)
    {
       $user  = User::withTrashed()->where('id', '=', $id);
       $user->restore();
       return array('success' => true, 'message' => trans('message.success_update'), 'tr_id' => $id); 
    }

    public function search()
    {
      	if(Request::ajax())
      	{
	      	$request = Request::all();
	      	$search = $request['search'];
	      	$column = $request['column'];
	      	//$user = User::where();
	      	if (trim($column) != '')
	        {
	            if (trim($search) != '') 
	            {
	                $user = User::where($column, "LIKE", "%$search%")->orderBy('user', 'ASC')->paginate();
	            }
	        }else
	        {
	            if(trim($search) != '') 
	            {
	                $user = User::where("user", "LIKE", "%$search%")->orWhere('email', "LIKE", "%$search%")->orWhere('type', "LIKE", "%$search%")->orderBy('user', 'ASC')->paginate();
	            }else
	            {
	            	 $user = User::paginate();
	            }
	        }

	        if($user->total()>0) 
		    {
		       	return View::make('back.table.user')->with('users', $user);
		    }else
		    {
		       
		        return View::make('back.table.user')->with('users', $user)->with('menssage_warning', trans('message.search'));
		    }
		}
    }

}
