<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\models\ContactModel;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
//use Illuminate\Mail\message;

class ContactController extends Controller
{
    public function newContact()
    {
        if (Request::ajax()) {	
         return view('front.form.contact');
        }
    }

    public function store()
    {
    	if (Request::ajax()) {
                    
            $request = Request::all();
        	   $rules = [
        		'name_con'        => 'required',
        		'email_con'       => 'required',
        		'description' => 'required',
        	   ];
    	   $validator = Validator::make($request, $rules);
    	   if($validator->fails()) 
    	   {
    		return array('fail' => true, 'errors' => $validator->getMessageBag()->toArray());
    	   }else
    	   {
    		$id_Con = ContactModel::create($request)->id_Con;
    		if ($id_Con) 
            {
                $fromEmail  =   'procuraduriaguarico@gmail.com';
                $fromName   =   'PROCURADURIA DEL ESTADO BOLIVARIANO DE GUARICO';
    			/*Mail::send('front.include.email', $request, function($message) use ($fromName, $fromEmail){
                    $message->to($fromEmail, $fromName);
                    $message->from($fromEmail, $fromName);
                    $message->subject('Nuevo mensaje de contacto');
                });*/
                return array('success' => true, 'message' => trans('message.success_update'), 'tr_id' => $id_Con);	
    		}
    	   }
        }
    }
}