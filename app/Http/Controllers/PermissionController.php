<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
    	$roles = Role::all()->pluck('name', 'id');
    	return view('back.backNewPermission', ['roles'=>$roles]);
    }

    public function store()
    {
    	$request   = Request::all();
    	$rules     = [
    				'role_id' => 'required',
    				'name'    => 'required|unique:permissions',
    	];

    	$validator = Validator::make($request, $rules);
    	if ($validator->fails()) 
    	{
    		return Redirect::to('/newPermission')->withErrors($validator->errors())->withInput();
    	}else
    	{
    		$role = Role::find($request['role_id']);
    		if (Permission::create(['name'=>$request['name']])) 
    		{
    			 //Reset cached roles and permissions
        		app()['cache']->forget('spatie.permission.cache');
    			$role->givePermissionTo($request['name']);
    			if ($role->hasPermissionTo($request['name'])) 
    			{
    				return Redirect::to('/newPermission')->with('menssage_success', trans('message.success_save'));
    			}
    		}
    	}

    }

    public function getTablePermission()
    {
    	$permissions = Permission::paginate();
    	if ($permissions->count()>0)
    	{
    		return view('back.table.permission', ['permissions'=>$permissions]);
    	}

    }
}
