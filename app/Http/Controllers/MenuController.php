<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use App\models\MenuModel;
use App\models\SubmenuModel;

class MenuController extends Controller
{
   public function destroy($id)
   {
      $menu  = MenuModel::find($id);
      $submenu = SubmenuModel::GetSubmenu($menu->id_Men);
      $menu->delete();
      if($submenu->count() > 0 ) 
      {
      	//dd($submenu);
      	$submenu->delete();
      }
      	return array('success' => true, 'message' => trans('message.success_update'), 'tr_id' => $id);
    }

   public function index()
   {
   	 
   	 $menus = MenuModel::getMenu();
   	 return View::make('back.backNewMenu')->with('menus', $menus);
   }

    public function store()
    {
    	$position = 0;
    	$menu = MenuModel::getMenu();
    	$request = Request::all();
    	$rules = [
          'etiqueta_men'   => 'required',
          'position'       => 'required',
          //'get_menu'       => 'required',
          'active_men'    => 'required',
        ];
        $Validator = Validator::make($request, $rules);
        if($Validator->fails()) 
		{
			return Redirect::to('/newMenu')->withErrors($Validator->errors())->withInput();
		}else
		{
			if($menu->count()==0) //si menu esta vacio quiere decir que es el primer registro
			{
				//echo 'primer registro';
				//$noticeModel = new MenuModel;
          		$id_Men = MenuModel::create($request)->id_Men;
          		if($id_Men) 
          		{
          			$query_menu = MenuModel::find($id_Men); //consulto el menu registrado
          			$query_menu->position_men = 1; // y le asigno la posicion 1
          			
          			if ($query_menu->save()) 
          			{
          			     return Redirect::to('/newMenu')->with('menssage_success', trans('message.success_save'));   
          			}           
          		}
			}else //se tiene que regitrar de acuerdo al aposicion que seleccione
			{
				if ($request['position']==0) //si posicion es igual a "antes"
				{
					if(empty($request['get_menu'])) //si esta vacio lo regitro de primero
					{
						//aqui consulto cada uno de los menu que sean igual o mayor al primero para actualizarlos
						$menu_query = MenuModel::all()->where('position_men', '>=' , 1);
						if ($menu_query->count()>0) //comprobar que no venga vacio
						{
							foreach ($menu_query as $value) //recorrer el query y actualizo las posiciones
							{
					
								$query_update = MenuModel::find($value['id_Men']);
								$query_update->position_men = $value['position_men']+1;
								$query_update->save();
								//echo  $value['id_Men'].'=>'.$value['position_men'].'<br>';
							}
							$id_Men = MenuModel::create($request)->id_Men;
			          		if($id_Men) 
			          		{
			          			$query_menu = MenuModel::find($id_Men); //consulto el menu registrado
			          			$query_menu->position_men = 1; // y le asigno la posicion 1
			          			$query_menu->save();           //guardo
			          			return Redirect::to('/newMenu')->with('menssage_success', trans('message.success_save'));
			          		}
						}
						//echo 'si esta vacio lo regitro de primero';
					}else //si selecciona un menu lo registro de acuerdo a la posicion
					{
						$query_men_select = MenuModel::find($request['get_menu']);
						//dd($query_men_select['position_men']);
						//aqui consulto cada uno de los menu que sean igual o mayor al seleccionado para actualizarlos
						$menu_query = MenuModel::all()->where('position_men', '>=' , $query_men_select['position_men']);
						if ($menu_query->count()>0) //comprobar que no venga vacio
						{
							foreach ($menu_query as $value) //recorrer el query y actualizo las posiciones
							{
					
								$query_update = MenuModel::find($value['id_Men']);
								$query_update->position_men = $value['position_men']+1;
								$query_update->save();
								//echo  $value['id_Men'].'=>'.$value['position_men'].'<br>';
							}
							$id_Men = MenuModel::create($request)->id_Men;
			          		if($id_Men) 
			          		{
			          			$query_menu = MenuModel::find($id_Men); //consulto el menu registrado
			          			$query_menu->position_men = $query_men_select['position_men']; // y le asigno la posicion 1
			          			$query_menu->save();           //guardo
			          			return Redirect::to('/newMenu')->with('menssage_success', trans('message.success_save'));
			          		}
						}
					}

				}elseif ($request['position']==1) //si posicion es igual despues dd
				{
					if(empty($request['get_menu'])) //si esta vacio lo regitro de ultimo
					{
						$menu_query = MenuModel::all()->max('position_men');
						if($menu_query<>null) //comprobar que no venga vacio
						{
							$position = $menu_query+1; //y le asigno la posicion ultima
						}else
						{
						 	$position = 1; //sino asumo que es el primer registro 
						}
						$id_Men = MenuModel::create($request)->id_Men; //registramos el menu
			          	if($id_Men) 
			          	{
			          		$query_menu = MenuModel::find($id_Men); //consulto el menu registrado
			          		$query_menu->position_men = $position; // y le asigno la posicion ultima
			          		$query_menu->save();           //guardo
			          		return Redirect::to('/newMenu')->with('menssage_success', trans('message.success_save'));
			          	}
					}else
					{
						$query_men_select = MenuModel::find($request['get_menu']);
						//aqui consulto cada uno de los menu que sean igual o mayor al seleccionado para actualizarlos
						$menu_query = MenuModel::all()->where('position_men', '>' , $query_men_select['position_men']);
						//dd($menu_query);
						if ($menu_query->count()>0) //comprobar que no venga vacio
						{
							foreach ($menu_query as $value) //recorrer el query y actualizo las posiciones
							{
					
								$query_update = MenuModel::find($value['id_Men']);
								$query_update->position_men = $value['position_men']+1;
								$query_update->save();
							}
							$position = $query_men_select['position_men']+1;
							/*
							$id_Men = MenuModel::create($request)->id_Men;
			          		if($id_Men) 
			          		{
			          			$query_menu = MenuModel::find($id_Men); //consulto el menu registrado
			          			$query_menu->position_men = $query_men_select['position_men']+1; // y le asigno la posicion 1
			          			$query_menu->save();           //guardo
			          			return Redirect::to('/newMenu')->with('menssage_success', trans('message.success_save'));
			          		}*/
						}else //si viene vacio es porque se selecciono el ultimo menu
						{
							if ($query_men_select['position_men'] == MenuModel::all()->max('position_men')) //comprobamos de que es asi 
							{
								$position = $query_men_select['position_men']+1;
							}
						}

						$id_Men = MenuModel::create($request)->id_Men;
				        if($id_Men) 
				        {
				          	$query_menu = MenuModel::find($id_Men); //consulto el menu registrado
				          	$query_menu->position_men = $position; // y le asigno la posicion 1
				          	if ($query_menu->save()) 
				          	{      
				          		return Redirect::to('/newMenu')->with('menssage_success', trans('message.success_save'));
				          	}
				        }
					}
				}
			}
			
		}
    }

    public function getUpdateMenu($id) 
    {
    	$menus = MenuModel::getMenu();
    	$menu  = MenuModel::find($id);
    	return view('back.form.updateMenu', ['menu' => $menu, 'menus' => $menus]); 
    }

    public function search()
    {
      //$notices = NoticeModel::author(Request::input('search'))->orderBy('id_Not', 'ASC')->paginate();
      $menus = MenuModel::search(Request::all())->orderBy('position_men', 'ASC')->paginate();
      if ($menus->total()>0) 
      {
       	return View::make('back.table.menu')->with('menus', $menus);
      }else
      {
        $menus = MenuModel::paginate();
        return View::make('back.table.menu')->with('menus', $menus)->with('menssage_warning', trans('message.search'));
      } 
      
    }

    public function getTable()
    {
    	$menus = MenuModel::search(null)->orderBy('position_men', 'ASC')->paginate();
    	if ($menus->total()>0) 
    	{
    	    return View::make('back.table.menu')->with('menus', $menus);
    	}else
     	{
        	$menus = MenuModel::paginate();
        	return View::make('back.table.menu')->with('menus', $menus)->with('menssage_warning', trans('message.search'));
     	} 
    }

    public function postUpdate() 
    { 
    	
    	if(Request::ajax())
      	{
      		$request = Request::all();
        	$id = $request['id_Men'];
        	$bandera = false;
       
        	if(empty($request['get_menu'])) 
        	{
        		$rules = ['etiqueta_men'   => 'required', 'active_men'    => 'required'];
        		$bandera = true;
        	}else
        	{
        		$rules = ['etiqueta_men'   => 'required', 'position' => 'required', 'active_men'    => 'required'];
        		$bandera = false;
        	}
        	
	        $validator = Validator::make($request, $rules); 
	        if($validator->fails()) 
	        {
	        	return array('fail' => true, 'errors' => $validator->getMessageBag()->toArray()); 
	        }else
	        {
	        	$menu = MenuModel::find($id);
	        	if(empty($request['get_menu']) && empty($request['position'])) // si los dos estan vacios
	        	{
	        		//return array('fail' => true, 'errors' => $validator->getMessageBag()->toArray());
	        		$menu->fill($request);
	        		if($menu->save()) 
	        		{
	        			return array('success' => true, 'message' => trans('message.success_update'), 'tr_id' => $id);
	        		}
	        	}else
	        	{
	        		
	        		if($request['position']==1) //si posicion es igual a "antes"
					{
						if(empty($request['get_menu'])) //si esta vacio lo regitro de primero
						{
							//aqui consulto cada uno de los menu que sean igual o mayor al primero para actualizarlos
							$menu_query = MenuModel::all()->where('position_men', '>=' , 1);
							if ($menu_query->count()>0) //comprobar que no venga vacio
							{
								foreach ($menu_query as $value) //recorrer el query y actualizo las posiciones
								{
						
									$query_update = MenuModel::find($value['id_Men']);
									$query_update->position_men = $value['position_men']+1;
									$query_update->save();
								}
								$menu->fill($request);
				          		if($menu->save()) 
				          		{
				          			//$query_menu = MenuModel::find($id); //consulto el menu registrado
				          			$menu->position_men = 1; //y le asigno la posicion 1
				          			if($menu->save()) 
				          			{
				          				return array('success' => true, 'message' => trans('message.success_update'), 'tr_id' => $id);
				          			}
				          		}
							}
							//echo 'si esta vacio lo regitro de primero';
						}else //si selecciona un menu lo registro de acuerdo a la posicion
						{
							$query_men_select = MenuModel::find($request['get_menu']);
							//dd($query_men_select['position_men']);
							//aqui consulto cada uno de los menu que sean igual o mayor al seleccionado para actualizarlos
							$menu_query = MenuModel::all()->where('position_men', '>=' , $query_men_select['position_men']);
							if ($menu_query->count()>0) //comprobar que no venga vacio
							{
								foreach ($menu_query as $value) //recorrer el query y actualizo las posiciones
								{
						
									$query_update = MenuModel::find($value['id_Men']);
									$query_update->position_men = $value['position_men']+1;
									$query_update->save();
									//echo  $value['id_Men'].'=>'.$value['position_men'].'<br>';
								}
								//$id_Men = MenuModel::create($request)->id_Men;
								$menu->fill($request);
				          		if($menu->save()) 
				          		{
				          			$menu->position_men = $query_men_select['position_men'];
				          			if ($menu->save()) 
				          			{
				          				return array('success' => true, 'message' => trans('message.success_update'), 'tr_id' => $id);
				          			}
				          		}
							}
						}

					}elseif ($request['position']==2) //si posicion es igual despues dd
					{
						if(empty($request['get_menu'])) //si esta vacio lo regitro de ultimo
						{
							$menu_query = MenuModel::all()->max('position_men');
							if($menu_query<>null) //comprobar que no venga vacio
							{
								$position = $menu_query+1; //y le asigno la posicion ultima
							}else
							{
							 	$position = 1; //sino asumo que es el primer registro 
							}

							//$id_Men = MenuModel::create($request)->id_Men; //registramos el menu
							$menu->fill($request);
				          	if($menu->save()) 
				          	{
				          		$menu->position_men = $position;
				          		if ($menu->save()) 
				          		{
				          			return array('success' => true, 'message' => trans('message.success_update'), 'tr_id' => $id);
				          		}
				          	}
						}else
						{
							$query_men_select = MenuModel::find($request['get_menu']);
							//aqui consulto cada uno de los menu que sean igual o mayor al seleccionado para actualizarlos
							$menu_query = MenuModel::all()->where('position_men', '>' , $query_men_select['position_men']);
							//dd($menu_query);
							if ($menu_query->count()>0) //comprobar que no venga vacio
							{
								foreach ($menu_query as $value) //recorrer el query y actualizo las posiciones
								{
									$query_update = MenuModel::find($value['id_Men']);
									$query_update->position_men = $value['position_men']+1;
									$query_update->save();
								}

								$position = $query_men_select['position_men']+1;
								/*
								$menu->fill($request);
								if($menu->save()) 
								{
									$menu->position_men = $query_men_select['position_men']+1;
									if($menu->save()) 
				          			{
				          				return array('success' => true, 'message' => trans('message.success_update'), 'tr_id' => $id);
				          			}
								}*/
							}else //si viene vacio es porque se selecciono el ultimo menu
							{
								if ($query_men_select['position_men'] == MenuModel::all()->max('position_men')) //comprobamos de que es asi 
								{
									$position = $query_men_select['position_men']+1;
								}
							}

							$menu->fill($request);
							if($menu->save()) 
							{
								$menu->position_men = $position;
								if($menu->save()) 
				          		{
				          			return array('success' => true, 'message' => trans('message.success_update'), 'tr_id' => $id);
				          		}
							}
						}
					}
	        	}
	        }    
      	}
    }
}
