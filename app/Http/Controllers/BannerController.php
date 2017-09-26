<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use App\models\BannerModel;
use App\MyClass\Functions;
class BannerController extends Controller
{
    public function destroy($id)
    {
      $banner  = BannerModel::find($id);
      $banner->delete();
      return array('success' => true, 'message' => trans('message.success_update'), 'tr_id' => $id);
    }

    public function restore( $id )
    {
       //Indicamos que la busqueda se haga en los registros eliminados con withTrashed
       $banner  = BannerModel::withTrashed()->where('id_Ban', '=', $id);
       //Restauramos el registro
       $banner->restore();
       return array('success' => true, 'message' => trans('message.success_update'), 'tr_id' => $id); 
    }

    public function index()
    {
    	return View::make('back.backNewBanner');
    }

    public function postUpdate() 
    {
        if(Request::ajax()){
      		$request = Request::all();
        	$id = $request['id_Ban'];
            $file = Request::file('url_ban');
            $banner = BannerModel::find($id);
            $filename = $banner->url_ban;

        	$rules = [
	    	  'title_ban' => 'required',
	    	  'status_ban'  => 'required',
                'url_ban'   => 'max:2560',
	    	  //'url_ban' => 'image|max:2560',
	    	  //'url_ban'   => 'max:2560',1024*1024*1
	    	  //'url_ban'   => 'required',
	    	  //'url_ban'   => 'image|mimes:image/jpeg, image|mimes:image/png',
	    	];

	    	$messages = [
    		  'url_ban.max' => 'El Archivo imagen es muy grande.',
    		  'url_ban.image' => 'El Archivo no es tipo imagen.',
    		];
            
    		$validator = Validator::make($request, $rules, $messages);
    		if($validator->fails()) 
	        {
	        	return array('fail' => true, 'errors' => $validator->getMessageBag()->toArray()); 
	        }else
	        {
                //$banner->fill($request);
                $banner->title_ban = $request['title_ban'];
                $banner->content_ban = $request['content_ban'];
                
            	if($banner->save()) 
            	{
            		if(!empty($file)) 
		            {
                        //dd($file);
		                \Storage::disk('imgBanner')->put($filename,  \File::get($file));
		                return array('success' => true, 'message' => trans('message.success_update'), 'tr_id' => $id);
		            }else
		            {
		                return array('success' => true, 'message' => trans('message.danger_update'), 'tr_id' => $id);
		            }
            	}
                /*else
                {
                    return array('danger' => true, 'message' => trans('message.danger_update'), 'tr_id' => $id);
                }*/
	        }
      	}
    }

    public function getUpdate($id) 
    {
    	$banner  = BannerModel::find($id);
    	$image   = asset('/storage/banner/images/'.$banner->url_ban.'');
    	return view('back.form.updateBanner', ['banner' => $banner, 'image' => $image]); 
    }

    public function search()
    {
      //$notices = NoticeModel::author(Request::input('search'))->orderBy('id_Not', 'ASC')->paginate();
      $banners = BannerModel::search(Request::all())->orderBy('title_ban', 'ASC')->paginate();
      if($banners->total()>0) 
      {
       	return View::make('back.table.banner')->with('banners', $banners);
      }else
      {
        $banners = BannerModel::paginate();
        return View::make('back.table.banner')->with('banners', $banners)->with('menssage_warning', trans('message.search'));
      } 
    }

    public function getTableBanner()
    {
    	$banner = BannerModel::paginate();

    	if ($banner->count()>0) 
    	{
    		return View::make('back.table.banner')->with('banners', $banner);
    	}else
    	{
    		return View::make('back.table.banner')->with('banners', $banner);
    	}
    }

    public function store()
    {
    	$request = Request::all();
    	$rules = [
    	'title_ban' => 'required',
    	'status_ban'  => 'required',
    	//'url_ban' => 'required|image|max:2560',
    	'url_ban'   => 'required',
    	/*'url_ban'   => 'image|mimes:image/jpeg, image/png',*/
    	];

    	$messages = [
    		'url_ban.max' => 'El Archivo imagen es muy grande.',
    		'url_ban.image' => 'El Archivo no es tipo imagen.',
    	];
    	$validator = Validator::make($request, $rules, $messages);
    	if ($validator->fails()) 
    	{
    		return Redirect::to('/newBanner')->withErrors($validator->errors())->withInput();
    	}else
    	{
    		
    		$filename = Functions::renameImg('img_', 'png');
            $file = Request::file('url_ban');
            $request['url_ban'] = $filename;
    		$id_Ban = BannerModel::create($request)->id_Ban;
    		if($id_Ban)
    		{
    			\Storage::disk('imgBanner')->put($filename,  \File::get($file));
    			return Redirect::to('/newBanner')->with('menssage_success', trans('message.success_save'));  
    		}
            /*else{dd($id_Ban);}*/
    	}
    }
}
