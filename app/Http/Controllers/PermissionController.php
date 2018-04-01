<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use App\models\AppModel;

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

    public function update()
    {
    	if (Request::ajax()) 
    	{
    		$request    = Request::all();
    		$id         = $request['id'];
    		$permission = Permission::find($id);

    		$rules      = [
    			//'role_id' => 'required',
    			'name'    => 'required|unique:permissions,name,'.$id.'',
    		];
    		$validator = Validator::make($request, $rules);
    		if($validator->fails()) 
	        {
	        	return array('fail' => true, 'errors' => $validator->getMessageBag()->toArray()); 
	        }else
	        {
	        	$permission->name = $request['name'];
	        	if ($permission->save()) 
	        	{
	        		 return array('success' => true, 'message' => trans('message.success_update'), 'tr_id' => $id);
	        	}
	        }
    	}
    }
    public function getUpdate($id)
    {
    	$permission = Permission::find($id);
    	$roles = Role::all()->pluck('name', 'id');
    	return view('back.form.updatePermission', ['permission'=>$permission, 'roles'=>$roles]);
    }

    public function getTablePermission()
    {
    	$permissions = Permission::paginate();
    	$roles = DB::table('roles as r')->leftjoin('role_has_permissions as r_p', 'r.id','=', 'r_p.role_id')->get();
    	if ($permissions->count()>0)
    	{
    		return view('back.table.permission', ['permissions'=>$permissions, 'roles'=>$roles]);
    	}
    }

    public function destroy($id)
    {
    	if(Request::ajax()) 
    	{
    		$permission = Permission::find($id);
    		$permission->delete();
    		return array('success' => true, 'message' => trans('message.success_update'), 'tr_id' => $id);
    	}
    }

    public function search()
    {
       
      $permissions = AppModel::search_permission(Request::all())->orderBy('name', 'ASC')->paginate();
      $roles = DB::table('roles as r')->leftjoin('role_has_permissions as r_p', 'r.id','=', 'r_p.role_id')->get();
      if($permissions->total()>0) 
      {
       	return view('back.table.permission', ['permissions'=>$permissions, 'roles'=>$roles]);
      }else
      {
        $permissions = Permission::paginate();
        return View::make('back.table.permission')->with('permissions', $permissions)->with('roles', $roles)->with('menssage_warning', trans('message.search'));
      } 
    }

    public function getAssign($id)
    {
    	$permission = Permission::find($id);
    	$roles_id = DB::table('role_has_permissions')->select('role_id')->where('permission_id', '=', $id);
    	$roles  = DB::table('roles')->whereNotIn('id', $roles_id)->pluck('name', 'id');
    	
    	return view('back.form.assignPermission', ['permission'=>$permission, 'roles'=>$roles]);
    }

    public function assign()
    {
    	$request = Request::all();
    	$rules = [
    		'role_id' => 'required',
    	];

    	$validator = Validator::make($request, $rules);
    		if($validator->fails()) 
	        {
	        	return array('fail' => true, 'errors' => $validator->getMessageBag()->toArray()); 
	        }else
	        {
	        	$permission = Permission::find($request['id']);	        	
	        	$permission->roles()->attach($request['role_id']);
	        	$role = Role::find($request['role_id']);
	        	$role_id = $request['role_id'];
	        		 $html ="<div id=\"bs-callout-$role_id\">
                                                <a href=\"#\" class=\"close btn-xs btn-danger\" data-dismiss=\"\" aria-hidden=\"false\" onclick=\"confirmDeleted('remove$permission->id');\" title=\"".trans('label.confirm_remove_permission')."\">×</a>
                                                <blockquote class=\" fija bs-callout-success btn-xs primary\">
                                               <div class=\"bs-text\">";
                    $html .= "<u><a class=\"alert-warning\" href=\"#\" ><i class=\"fa fa-angle-right\"></i> ".trans('label.role').":</a> <b>$role->name</b></u>";
                    $html .=" <small><b>trans('label.permission'): </b>$permission->name</small></div></blockquote></div>";
                    // $html='<b>bien</b>';
                    $html .="<div id='add'></div>";
	        		 return array('success' => true, 'message' => trans('message.success_update'), 'id' => $permission->id, 'html' => $html);
	        }
    	//return view('back.form.assignPermission', ['permission'=>$permission, 'roles'=>$roles]);
    }

    public function remove($role_id, $permission_id)
    {
    	if(Request::ajax()) {
    		$permission = DB::table('role_has_permissions')->where('permission_id', '=', $permission_id)->where('role_id', '=', $role_id);
    		$permission->delete();
    		return array('success' => true, 'message' => trans('message.remove_permission'), 'id' => $role_id.'-'.$permission_id);
    	}
    }
}
