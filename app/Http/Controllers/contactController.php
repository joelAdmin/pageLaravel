<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\models\ContactModel;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function newContact()
    {
    	return view('front.form.contact');
    }

    public function store()
    {
    	$request = Request::all();
    	$rules = [
    		'name_con'        => 'required',
    		'email_con'       => 'required',
    		'description_con' => 'required',
    	];
    	$validator = Validator::make($request, $rules);
    	
    	if($validator->fails()) 
    	{
    		return array('fail' => true, 'errors' => $validator->getMessageBag()->toArray());
    	}else
    	{

    	}
    }
}