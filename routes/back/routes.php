<?php
 
	/*Route::group(array('before'=>'auth'), function()
	{
		Route::get('/newNotice', function () {
	    return view('backNewNotice');
		})->middleware('auth');
	});*/
	//Route:: match(['get','post'], '/newNotice', 'NoticeController@notice')->middleware('auth');
	Route::group(array('before'=>'auth', 'middleware' => ['permission:login_admin']), function()
	{
		//Route:: get('/newRole', 'RoleController@index')->middleware('auth');

		Route:: get('/newPermission', 'PermissionController@index')->middleware('auth');
		Route:: post('/newPermission', 'PermissionController@store')->middleware('auth');
		Route:: put('/newPermission', 'PermissionController@update')->middleware('auth');
		Route:: get('/getTablePermission', 'PermissionController@getTablePermission')->middleware('auth');
		Route:: get('/deletedPermission/{id}', 'PermissionController@destroy')->middleware('auth');
		Route:: get('/updatePermission/{id}', 'PermissionController@getUpdate')->middleware('auth');
		Route:: get('/searchPermission', 'PermissionController@search')->middleware('auth');
		Route:: get('/assignPermission/{id}', 'PermissionController@getAssign')->middleware('auth');
		Route:: post('/assignPermission', 'PermissionController@assign')->middleware('auth');
		Route:: get('/removePermission/{role_id}/{permission_id}', 'PermissionController@remove')->middleware('auth');
		
		Route:: get('import', 'ImportController@import')->middleware('auth');
		Route:: get('/newUser', 'UserController@index')->middleware('auth');
		Route:: post('/newUser', 'UserController@store')->middleware('auth');
		Route:: get('/getTableUser', 'UserController@getTableUser')->middleware('auth');
		Route:: get('/getUpdateUser/{id}', 'UserController@getUpdate')->middleware('auth');
		Route:: put('/postUpdateUser', ['as' => 'user.update', 'uses' => 'UserController@postUpdateUser'])->middleware('auth');
		Route:: get('/deletedUser/{id}', 'UserController@destroy')->middleware('auth');
		Route:: get('/restoreUser/{id}', ['as' =>  'user/restore', 'uses' => 'UserController@restore']);
		Route:: get('/searchUser', 'UserController@search')->middleware('auth');

		Route:: get('/newBanner', 'BannerController@index')->middleware('auth');
		Route:: post('/newBanner', 'BannerController@store')->middleware('auth');
		Route:: get('/getTableBanner', 'BannerController@getTableBanner')->middleware('auth');
		Route:: get('/searchBanner', 'BannerController@search')->middleware('auth');
		Route:: get('/getUpdateBanner/{id}', 'BannerController@getUpdate')->middleware('auth');
		Route:: put('/postUpdateBanner', ['as' => 'banner.update', 'uses' => 'BannerController@postUpdate'])->middleware('auth');
		Route:: get('/deletedBanner/{id}', 'BannerController@destroy')->middleware('auth');
		Route:: get('/restoreBanner/{id}', ['as' =>  'banner/restore', 'uses' => 'BannerController@restore']);

		Route:: get('/newSubmenu', 'SubmenuController@index')->middleware('auth');
		Route:: get('/getSubmenu/{idMen}', 'SubmenuController@getSubmenu')->middleware('auth');
		Route:: post('/newSubmenu', 'SubmenuController@store')->middleware('auth');
		Route:: get('/getTableSubmenu', 'SubmenuController@getTable')->middleware('auth');
		Route:: get('/searchSubmenu', 'SubmenuController@search')->middleware('auth');
		Route:: get('/deletedSubmenu/{id}', 'SubmenuController@destroy')->middleware('auth');
		Route:: get('/restoreSubmenu/{id}', ['as' =>  'submenus/restore', 'uses' => 'SubmenuController@restore']);
		Route:: get('/getUpdateSubmenu/{id}', 'SubmenuController@getUpdate')->middleware('auth');
		Route:: put('/postUpdateSubmenu', ['as' => 'submenu.update', 'uses' => 'SubmenuController@postUpdate'])->middleware('auth');

		Route:: get('/newMenu', 'MenuController@index')->middleware('auth');
		Route:: get('/getTableMenu', 'MenuController@getTable')->middleware('auth');
		Route:: get('/getUpdateMenu/{id}', 'MenuController@getUpdateMenu')->middleware('auth');
		Route:: put('/postUpdateMenu', ['as' => 'menu.update', 'uses' => 'MenuController@postUpdate'])->middleware('auth');
		Route:: post('/newMenu', 'MenuController@store')->middleware('auth');
		Route:: get('/searchMenu', 'MenuController@search')->middleware('auth');
		Route:: get('/deletedMenu/{id}', 'MenuController@destroy')->middleware('auth');
		Route:: get('/deletedProcess/{id}', 'MenuController@destroyProcess')->middleware('auth');
		Route::get('/restoreMenu/{id}', ['as' =>  'menus/restore', 'uses' => 'MenuController@restore']);

		Route:: get('/newNotice', 'NoticeController@newNotice')->middleware('auth');
		Route:: post('/newNotice', 'NoticeController@store')->middleware('auth');
		Route:: get('/search', 'NoticeController@search')->middleware('auth');
		Route:: get('/getTable', 'NoticeController@getTableNotice')->middleware('auth');
		Route:: get('/getUpdate/{id}', 'NoticeController@getUpdate')->middleware('auth');
		//Route:: put('/postUpdate/{id}', ['as' => 'notice.update', 'uses' => 'NoticeController@postUpdate'])->middleware('auth');
		Route:: put('/postUpdate', ['as' => 'notice.update', 'uses' => 'NoticeController@postUpdate'])->middleware('auth');
		Route:: get('/deletedNotice/{id}', 'NoticeController@destroy')->middleware('auth');
		//Route:: get('/restoreNotice/{id}', 'NoticeController@restore')->middleware('auth');
		
		Route::get('/restoreNotice/{id}', ['as' =>  'notices/restore', 'uses' => 'NoticeController@restore']);
		Route::get('/backHome', 'AuthController@index')->middleware('permission:login_admin');

		Route::get('/tableNotice', function () {
			    return view('back.table.notice');
		});
	});
