<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use App\models\MenuModel;
use App\models\SubmenuModel;

class SubmenuController extends Controller
{
    public function index()
    {
    	$menus = MenuModel::getMenu();
    	return View::make('back.backNewSubmenu')->with('menus', $menus);
    }

    public function getSubmenu($id_Men)
    {
    	//$submenus = SubmenuModel::all()->where('id_men', '==', $id_Men)->orderBy('position_sub', 'asc')->pluck('etiqueta_sub', 'id_Sub');
    	$submenus = SubmenuModel::getSubmenu($id_Men)->orderBy('position_sub', 'ASC')->pluck('etiqueta_sub', 'id_Sub');
    	if ($submenus->count()>0) 
    	{
    		return array('submenus' => json_encode($submenus));
            //return array('submenus' => $submenus);
    	}else
    	{
    		return array('submenus' => null);
    	}
    }

    public function store()
    {
    	$position = 0;
    	$menus = MenuModel::getMenu();
    	$submenus = SubmenuModel::all();
    	$request = Request::all();
    	$rules = [
    		'etiqueta_sub' => 'required',
    		'position'     => 'required',
    		'active_sub'   => 'required',
    		'id_men'       => 'required',
    	];

    	$validator = Validator::make($request, $rules);
    	if($validator->fails()) 
		{
			return Redirect::to('/newSubmenu')->withErrors($validator->errors())->withInput();
		}else
		{
			if ($submenus->count()==0)  //si menu esta vacio quiere decir que es el primer registro
			{
				$id_Sub = SubmenuModel::create($request)->id_Sub;
				if ($id_Sub) 
				{
					$query_sub = SubmenuModel::find($id_Sub);
					$query_sub->position_sub = 1;
					if ($query_sub->save()) 
					{
						return Redirect::to('/newSubmenu')->with('menssage_success', trans('message.success_save'));
					}
				}
			}else
			{
				if ($request['position']==1) 
				{
					
                    if(empty($request['get_submenu'])) //si esta vacio lo regitro de primero
                    {
                        //aqui consulto cada uno de los menu que sean igual o mayor al primero para actualizarlos
                        $submenu_query = SubmenuModel::all()->where('position_sub', '>=' , 1);
                        if ($submenu_query->count()>0) //comprobar que no venga vacio
                        {
                            foreach ($submenu_query as $value) //recorrer el query y actualizo las posiciones
                            {
                                $query_update = SubmenuModel::find($value['id_Sub']);
                                $query_update->position_sub = $value['position_sub']+1;
                                $query_update->save();
                                //echo  $value['id_Men'].'=>'.$value['position_men'].'<br>';
                            }
                            $id_Sub = SubmenuModel::create($request)->id_Sub;
                            if($id_Sub) 
                            {
                                $query_submenu = SubmenuModel::find($id_Sub); //consulto el menu registrado
                                $query_submenu->position_sub = 1; // y le asigno la posicion 1
                                $query_submenu->save();           //guardo
                                return Redirect::to('/newSubmenu')->with('menssage_success', trans('message.success_save'));
                            }
                        }
                        //echo 'si esta vacio lo regitro de primero';
                    }else //si selecciona un submenu de a lista, como referencia para la posicion
                    {
                        $query_sub_select = SubmenuModel::find($request['get_submenu']);
                        $submenu_query = SubmenuModel::all()->where('position_sub', '>=', $query_sub_select['position_sub']);
                        if ($submenu_query->count()>0) 
                        {
                            foreach ($submenu_query as $value) 
                            {
                                $query_update = SubmenuModel::find($value['id_Sub']);
                                $query_update->position_sub = $value['position_sub']+1;
                                $query_update->save();
                            } 

                            $id_Sub = SubmenuModel::create($request)->id_Sub;
                            if($id_Sub) 
                            {
                                $query_submenu = SubmenuModel::find($id_Sub);
                                $query_submenu->position_sub = $query_sub_select['position_sub'];                               
                                if( $query_submenu->save()) 
                                {
                                    return Redirect::to('/newSubmenu')->with('menssage_success', trans('message.success_save'));
                                }
                            }

                        }
                    }
				}elseif ($request['position']==2) //si posicion es igual despues dd
                {
                    if (empty($request['get_submenu'])) 
                    {
                        $submenu_query = SubmenuModel::all()->max('position_sub');
                        if ($submenu_query<>null) //verifico que no venga vacio
                        {
                            $position = $submenu_query+1; //le asigno la posicion ultima
                        }else
                        {
                            $position = 1; //si no asumo que es el primer registro
                        }
                        $id_Sub = SubmenuModel::create($request)->id_Sub;
                        if ($id_Sub) 
                        {
                            $query_submenu = SubmenuModel::find($id_Sub);
                            $query_submenu->position_sub = $position;
                            if($query_submenu->save()) 
                            {
                                return Redirect::to('/newSubmenu')->with('menssage_success', trans('message.success_save'));
                            }
                        }
                    }else
                    {
                        $query_sub_select = SubmenuModel::find($request['get_submenu']); //consulto el submenu seleccionado
                        $submenu_query = SubmenuModel::all()->where('position_sub', '>', $query_sub_select['position_sub']);
                        if ($submenu_query->count()>0)  //verificar q no venga vacio
                        {
                            foreach ($submenu_query as $value) //recorrer el query y actualizo las posiciones
                            {
                                $query_update = SubmenuModel::find($value['id_Sub']);
                                $query_update->position_sub = $value['position_sub']+1;
                                $query_update->save();
                            }
                            $position = $query_sub_select['position_sub']+1;
                        }else //si viene vacio es porq selecciono el ultimo registro
                        {
                            if ($query_sub_select['position_sub'] == SubmenuModel::all()->max('position_sub')) //comprobamos de que es asi 
                            {
                                $position = $query_sub_select['position_sub']+1;
                            }
                        }
                        $id_Sub = SubmenuModel::create($request)->id_Sub;
                        if ($id_Sub) 
                        {
                            $query_submenu = SubmenuModel::find($id_Sub);
                            $query_submenu->position_sub = $position;
                            if ($query_submenu->save()) 
                            {
                                return Redirect::to('/newSubmenu')->with('menssage_success', trans('message.success_save'));
                            }
                        }
                    }
                }
			}
		}
    }

    public function getTable()
    {
       $submenus = SubmenuModel::search(null)->orderBy('position_sub', 'ASC')->paginate();
       if ($submenus->total()>0) 
        {
            return View::make('back.table.submenu')->with('submenus', $submenus);
        }else
        {
            $menus = SubmenuModel::paginate();
            return View::make('back.table.submenu')->with('submenus', $submenus)->with('menssage_warning', trans('message.search'));
        } 
    }

    public function search()
    {
      //$notices = NoticeModel::author(Request::input('search'))->orderBy('id_Not', 'ASC')->paginate();
      $submenus = SubmenuModel::search(Request::all())->orderBy('position_sub', 'ASC')->paginate();
      if ($submenus->total()>0) 
      {
        return View::make('back.table.submenu')->with('submenus', $submenus);
      }else
      {
        $submenus = submenuModel::paginate();
        return View::make('back.table.submenu')->with('submenus', $submenus)->with('menssage_warning', trans('message.search'));
      } 
      
    }

    public function getUpdate($id)
    {
        $menus = MenuModel::getMenu();
        $submenu  = SubmenuModel::find($id);
        return view('back.form.updateSubmenu', ['submenu' => $submenu, 'menus' => $menus]); 
    }

    public function postUpdate()
    {
        if (Request::ajax()) 
        {
            $request = Request::all();
            $id = $request['id_Sub'];
            $bandera = false;

            if (empty($request['get_submenu'])) 
            {
                $rules = ['etiqueta_sub' => 'required', 'active_sub' => 'required'];
                $bandera = true;
            }else
            {
                $rules = ['etiqueta_sub' => 'required', 'position' => 'required', 'active_sub' => 'required'];
                $bandera = false;
            }
            $validator = Validator::make($request, $rules); 
            if($validator->fails()) 
            {
                return array('fail' => true, 'errors' => $validator->getMessageBag()->toArray()); 
            }else
            {
                $submenu = SubmenuModel::find($id);
                if(empty($request['get_submenu']) && empty($request['position'])) // si los dos estan vacios
                {
                    $submenu->fill($request);
                    if($submenu->save()) 
                    {
                        return array('success' => true, 'message' => trans('message.success_update'), 'tr_id' => $id);
                    }
                }else
                {
                    if($request['position'] == 1) 
                    {
                        if(empty($request['get_submenu'])) 
                        {
                            //aqui consulto cada uno de los menu que sean igual o mayor al primero para actualizarlos
                            $submenu_query = SubmenuModel::all()->where('position_sub', '>=' , 1);
                            if ($submenu_query->count()>0) //comprobar que no venga vacio
                            {
                                foreach ($submenu_query as $value) //recorrer el query y actualizo las posiciones
                                {
                        
                                    $query_update = SubmenuModel::find($value['id_Sub']);
                                    $query_update->position_sub = $value['position_sub']+1;
                                    $query_update->save();
                                }
                                $submenu->fill($request);
                                if($submenu->save()) 
                                {
                                    //$query_menu = MenuModel::find($id); //consulto el menu registrado
                                    $submenu->position_sub = 1; //y le asigno la posicion 1
                                    if($submenu->save()) 
                                    {
                                        return array('success' => true, 'message' => trans('message.success_update'), 'tr_id' => $id);
                                    }
                                }
                            }
                        }else
                        {
                            $query_sub_select = SubmenuModel::find($request['get_submenu']);
                            $submenu_query = SubmenuModel::all()->where('position_sub', '>=' , $query_sub_select['position_sub']);
                            if ($submenu_query->count()>0) //comprobar que no venga vacio
                            {
                                foreach ($submenu_query as $value) //recorrer el query y actualizo las posiciones
                                {
                        
                                    $query_update = SubmenuModel::find($value['id_Sub']);
                                    $query_update->position_sub = $value['position_sub']+1;
                                    $query_update->save();
                                }
                                
                                $submenu->fill($request);
                                if($submenu->save()) 
                                {
                                    $submenu->position_sub = $query_sub_select['position_sub'];
                                    if ($submenu->save()) 
                                    {
                                        return array('success' => true, 'message' => trans('message.success_update'), 'tr_id' => $id);
                                    }
                                }
                            }
                        }
                    }elseif($request['position']==2) //si posicion es igual despues 
                    {
                        if(empty($request['get_submenu'])) //si esta vacio lo regitro de ultimo
                        {
                            $submenu_query = SubmenuModel::all()->max('position_sub');
                            if($submenu_query<>null) //comprobar que no venga vacio
                            {
                                $position = $submenu_query+1; //y le asigno la posicion ultima
                            }else
                            {
                                $position = 1; //sino asumo que es el primer registro 
                            }

                            $submenu->fill($request);
                            if($submenu->save()) 
                            {
                                $submenu->position_sub = $position;
                                if ($submenu->save()) 
                                {
                                    return array('success' => true, 'message' => trans('message.success_update'), 'tr_id' => $id);
                                }
                            }
                        }else
                        {
                            $query_sub_select = SubmenuModel::find($request['get_submenu']);
                            //aqui consulto cada uno de los menu que sean igual o mayor al seleccionado para actualizarlos
                            $submenu_query = SubmenuModel::all()->where('position_sub', '>' , $query_sub_select['position_sub']);
                            //dd($menu_query);
                            if ($submenu_query->count()>0) //comprobar que no venga vacio
                            {
                                foreach ($submenu_query as $value) //recorrer el query y actualizo las posiciones
                                {
                                    $query_update = SubmenuModel::find($value['id_Sub']);
                                    $query_update->position_sub = $value['position_sub']+1;
                                    $query_update->save();
                                }

                                $position = $query_sub_select['position_sub']+1;
                               
                            }else //si viene vacio es porque se selecciono el ultimo menu
                            {
                                if ($query_sub_select['position_sub'] == SubmenuModel::all()->max('position_sub')) //comprobamos de que es asi 
                                {
                                    $position = $query_sub_select['position_sub']+1;
                                }
                            }

                            $submenu->fill($request);
                            if($submenu->save()) 
                            {
                                $submenu->position_sub = $position;
                                if($submenu->save()) 
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
