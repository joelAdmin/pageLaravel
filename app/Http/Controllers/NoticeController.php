<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\models\NoticeModel;
use App\models\ImageModel;
use App\MyClass\Functions;

class NoticeController extends Controller
{
    
    public function destroy($id)
    {
      $notice  = NoticeModel::find($id);
      $notice->delete();
      return array('success' => true, 'message' => trans('message.success_update'), 'tr_id' => $id);
    }

    public function restore($id)
    {
       //Indicamos que la busqueda se haga en los registros eliminados con withTrashed
       $notice  = NoticeModel::withTrashed()->where('id_Not', '=', $id);
       //Restauramos el registro
       $notice->restore();
       return array('success' => true, 'message' => trans('message.success_update'), 'tr_id' => $id); 
    }

    public function search()
    {
      //$notices = NoticeModel::author(Request::input('search'))->orderBy('id_Not', 'ASC')->paginate();
      $notices = NoticeModel::search(Request::all())->orderBy('notices.id_Not', 'ASC')->paginate();
      if ($notices->total()>0) 
      {
        return View::make('back.table.notice')->with('notices', $notices);
      }else
      {
        $notices = NoticeModel::getNotices(null)->paginate();
        return View::make('back.table.notice')->with('notices', $notices)->with('menssage_warning', trans('message.search'));
      }
    }

    public function getTableNotice()
    {
      $notices = NoticeModel::getNotices(null)->paginate();
      if ($notices->total()>0) 
      {
        return View::make('back.table.notice')->with('notices', $notices);
      }else
      {
        return View::make('back.table.notice')->with('notices', $notices)->with('menssage_warning', trans('message.search'));
      }
    }

    public function getUpdate($id) 
    { 
     
      $notice  = NoticeModel::find($id);
      $image   = asset('/storage/notice/images/').'/'.NoticeModel::getNotices($id)->get()[0]->name_img;
      return view('back.form.editNotice', ['notice' => $notice, 'category' => NoticeModel::getCategory(), 'scope' => NoticeModel::getScope(), 'image' => $image]); 
    }

    public function postUpdate() 
    { 
      
      if(Request::ajax())
      {
        $inputs = Request::all();
        $id = $inputs['id_Not'];
        $file = Request::file('url_image');
        $notice = NoticeModel::find($id);
        $filename = NoticeModel::getNotices($id)->get()[0]->name_img; //$notice->image_noticess()->get()->find($id)->url_img;
        //dd($notice);
        $rules = [
            'author_not'   => 'required',
            'id_cat'       => 'required',
            'id_sco'       => 'required',
            'title_not'    => 'required',
            'subtitle_not' => 'required',
            //'url_image'    => 'required',
            'inlet_not'    => 'required',
            'content_not'  => 'required',
            'type_not'     => 'required',
            'estatus_not'  => 'required',
          ];
          $validator = Validator::make($inputs, $rules);
          if($validator->fails()) 
          { 
            return array('fail' => true, 'errors' => $validator->getMessageBag()->toArray()); 
          }else
          {
            $notice->fill($inputs);
            if($notice->save()) 
            {
              if (!empty($file)) 
              {
                \Storage::disk('imgNotice')->put($filename,  \File::get($file));
                 return array('success' => true, 'message' => trans('message.success_update'), 'tr_id' => $id);
              }else
              {
                return array('success' => true, 'message' => trans('message.success_update'), 'tr_id' => $id);
              }
            }
          }
      } 
    }
  
    public function newNotice()
    {
      $resul_cat  = NoticeModel::getCategory();
    	$resul_sco  = NoticeModel::getScope();
      //$notices = NoticeModel::paginate();
    	return View::make('back.backNewNotice')->with('category', $resul_cat)->with('scope', $resul_sco); //->with('notices', $notices);
    }

    public function store()
    {

    	$inputs = Request::all();
    	$rules = [
          'author_not'   => 'required',
          'id_cat'       => 'required',
          'id_sco'       => 'required',
          'title_not'    => 'required',
          'subtitle_not' => 'required',
          'url_image'    => 'required',
          'inlet_not'    => 'required',
          'content_not'  => 'required',
          'type_not'     => 'required',
          'estatus_not'  => 'required',
        ];
        $Validator = Validator::make($inputs, $rules);
        //dd($Validator);
        if ($Validator->fails()) 
		    {
			     return Redirect::to('/newNotice')->withErrors($Validator->errors())->withInput();
		    }else
        {
        
          $noticeModel = new NoticeModel;
          $id_Not = $noticeModel->create($inputs)->id_Not;
          if($id_Not) 
          {
            $imageNoticeModel = new ImageModel();
            $filename = Functions::renameImg('img_', 'png');
            $file = Request::file('url_image');
            //$name = $file->getClientOriginalName();
            $imageNoticeModel->name_img = $filename;
            $imageNoticeModel->url_img = $filename;
            $imageNoticeModel->status_img = true;
          
            if($imageNoticeModel->save()) 
            {
              $id_Img = $imageNoticeModel->id_Img;

              $findNoticeModel = NoticeModel::find($id_Not);
              //dd($findNoticeModel);
              //$findNoticeModel = ImageModel::find($id_Img);
              //dd($findNoticeModel);
              //dd($findNoticeModel->image_noticess()->get());
              //$findNoticeModel->image_noticess()->attach([1=>['status_notImg'=>true], 1=>['id_not'=>$id_Not]]);
              $findNoticeModel->image_noticess()->attach($id_Img);
              //indicamos que queremos guardar un nuevo archivo en el disco local
              \Storage::disk('imgNotice')->put($filename,  \File::get($file));
              
              return Redirect::to('/newNotice')->with('menssage_success', trans('message.success_save'));

            }else
            {
              return Redirect::to('/newNotice')->with('menssage_danger', trans('message.danger_save'))->withErrors($Validator->errors())->withInput();
            }
        }else
        {
          return Redirect::to('/newNotice')->with('mensaje_danger', trans('message.danger_save'))->withErrors($Validator->errors())->withInput();
        }
 
          
        }

    }
}
