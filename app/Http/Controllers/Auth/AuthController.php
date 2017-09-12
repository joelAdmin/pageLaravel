<?php
class AuthController extends BaseController {
	
	public function showLogin()
	{
		//check is session active (verificar si la session esta activa)
		if(Auth::check())
		{
			//if we have session active will show page home  (Si tenemos sesión activa mostrará la página de inicio)
			//return Redirect::to('admin');
			View::make('backHome');
		}
		// if there is no session active will show the form (Si no hay sesión activa mostramos el formulario)
		return View::make('backHome');
	}

	public function postLogin()
	{
		// we get the data the form (obtenemos los datos del formulario)
		$data = [
			'username' => Input::get('username'),
			'password' => Input::get('password')
		];

		// we check the data (verificamos los datos)
		if(Auth::attempt($data, Input::get('remember')))
		{
			//if our data is correct will show the page home (Si nuestros datos son correctos mostramos la página de inicio)
			return Redirect::intended('/admin/home')
		}
		//if the data is not the correct, will return to login and we show an error (Si los datos no son los correctos volvemos al login y mostramos un error) 
		return Redirect::back()->with('error_message', 'Invalid data')->withInput();
	}

	public function logOut()
    {
        // we closed the session (Cerramos la sesión)
        Auth::logout();
        // we returned to login and showed a message indicating was closed the session (Volvemos al login y mostramos un mensaje indicando que se cerró la sesión)
        return Redirect::to('login')->with('error_message', 'Logged out correctly');
    }

}