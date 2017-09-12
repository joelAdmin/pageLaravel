<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function index()
	{
		return View::make('back.backHome');
	}

    public function showLogin()
	{
		//check is session active (verificar si la session esta activa)
		if(Auth::check())
		{
			/***if we have session active will show page home  
			  (Si tenemos sesión activa mostrará la página de inicio)***/
			return Redirect::intended('/backHome');
		}
		/***if there is no session active will show the form 
		(Si no hay sesión activa mostramos el formulario)***/

		return View::make('back.backLogin');
	}
	
	public function postLogin()
	{
		// we get the data the form (obtenemos los datos del formulario)
		$data = [
			 'name' => Input::get('user'),
		 'password' => Input::get('passwd')
		];

		$inputs = Request::all();
		$rules = [
            'user' => 'required|min:4|max:20|regex:/^[0-9a-z]+$/i',
          'passwd' => 'required',
        ];
        //regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/'
        $messages = [
        	'user.required' => VALID_REQUIRED,
            	 'user.min' => VALID_USER_MIN,
            	 'user.max' => VALID_USER_MAX,
               'user.regex' => VALID_REGEX,
          'passwd.required' => VALID_REQUIRED,
        ];

        $Validator = Validator::make($inputs, $rules, $messages);
		// we check the data (verificamos los datos)
		if(Auth::attempt($data))
		{
			/***if our data is correct will show the page home 
			  (Si nuestros datos son correctos mostramos la página de inicio)***/
			return Redirect::intended('/backHome');
		}
		if ($Validator->fails()) 
		{
			return Redirect::to('login')->withErrors($Validator->errors())->withInput(Request::except('passwd'));
		}
		 /***if the data is not the correct, will return to login and we show an error 
		   (Si los datos no son los correctos volvemos al login y mostramos un error)***/
		 return Redirect::to('login')->with('mensaje_error', MSG_ERROR_LOGIN)->withInput();
	}
	
	public function logOut()
    {
        // we closed the session (Cerramos la sesión)
        Auth::logout();
        /*** we returned to login and showed a message indicating was closed the session
         (Volvemos al login y mostramos un mensaje indicando que se cerró la sesión)***/
        return Redirect::to('login')->with('error_message', 'Logged out correctly');
    }

}
