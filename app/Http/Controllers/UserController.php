<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use App\models\User\User;

class UserController extends Controller
{
    public function index()
    {
    	return View::make('back.backNewUser');
    }

    public function store()
    {
    	$request = Request::all();
    	$rules = [
    		'email'        => 'required|email|unique',
    		'user'         => 'required',
    		'type'         => 'required',
    		'password'     => 'required|min:6|confirmed',
    		'confirmPassword' => 'required|min:6|confirmed',
    	];
    	$validator = Validator::make($request, $rules);
    	if ($validator->fails()) {
    		return Redirect::to('/newUser')->withErrors($validator->errors())->withInput();
    	}else
    	{
    		dd($request);
    	}
    }
}
