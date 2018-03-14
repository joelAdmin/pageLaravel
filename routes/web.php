<?php
Route:: get('/', 'PageController@index');
Route::group(['middleware' => ['web']], function () 
{
	Route::group(array('before'=>'auth'), function()
	{
		//Esta sera nuestra ruta de bienvenida.
		Route:: get('/', 'PageController@index');
		//esta ruta nos servira para cerrar sesión.
		Route::get('logout', 'AuthController@logout');
		Route::get('logoutFront', 'AuthController@logoutFront');
	});
	
	//Route::get('/newCommitFront/{commit}/{id_Not}', 'CommitController@store');
	Route::post('/newCommitFront', 'CommitController@store');
	Route::get('/newAnswer/{id}', 'CommitController@getNewAnswer');
	//Route::get('/newAnswerModal/{id}', 'CommitController@getNewAnswerModal');
	Route::get('/newAnswerModal/{id}', 'CommitController@getNewAnswerModal');
	Route::get('/viewCommits/{id}', 'CommitController@viewCommits');
	Route::get('/viewAnswers/{id}', 'AnswerController@viewAnswers');
	Route::post('/newAnswerFront', 'AnswerController@store');

	Route::get('/newUserFront', 'UserController@viewUserFront');
	Route::post('/newUserFront', 'UserController@storeFront');
	Route::get('/backHome', 'AuthController@index');
	Route::get('login', 'AuthController@showLogin');
	Route::post('login', 'AuthController@postLogin');
	Route::get('/showSubmenuAjax/{id}', 'PageController@showSubmenuAjax');
	Route::get('/readMore/{id}', 'PageController@readMore');
	Route::get('/newContact', 'ContactController@newContact');
	Route::post('/newContact', 'ContactController@store');
	Route::get('/loginFront', 'AuthController@viewLoginFront');
	Route::post('/loginFront', 'AuthController@postLoginFront');
	Route::get('lang/{lang}', function ($lang) 
	{
    	session(['lang' => $lang]);
        return \Redirect::back();
 	})->where(['lang' => 'en|es']);
});

/*
Route::get('/', function () {
    return view('frontHome');
});
Route::group(['middleware' => ['web']], function () 
{
	Route::group(array('before'=>'auth'), function()
	{
		//Esta sera nuestra ruta de bienvenida.
		Route::get('/', function()
		{
			return View::make('frontHome');
		});
		//esta ruta nos servira para cerrar sesión.
		Route::get('logout', 'AuthController@logout');
	});

	Route::get('/backHome', function () {
    	return view('backHome');
	})->middleware('auth');
	Route::get('login', 'AuthController@showLogin');
	Route::post('login', 'AuthController@postLogin');

	Route::get('lang/{lang}', function ($lang) 
	{
    	session(['lang' => $lang]);
        return \Redirect::back();
 	})->where(['lang' => 'en|es']);
});
*/
//Auth::routes();
//Route::get('/home', 'HomeController@index');
