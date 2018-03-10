<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\models\MenuModel;
use App\models\SubmenuModel;
use App\models\NoticeModel;
use App\models\BannerModel;
class PageController extends Controller
{
    public function index()
    {
        $menus = MenuModel::menuAll();
        $submenus = MenuModel::getMenuAll();
        $banner = BannerModel::all();
        //$notices = NoticeModel::paginate();
        //$notice = new NoticeModel;
        $notices = NoticeModel::getNotices(null)->paginate(2);
        $commits = NoticeModel::getCommit()->orderBy('id_com', 'desc')->get();
        $answers = NoticeModel::getAnswer()->orderBy('id_ans', 'desc')->get();
       // $commits = json_decode($commits);
        
      // dd(count($commits));
        //dd($notice->notices()->get());
        return View::make('front.frontHome')->with('submenus', $submenus)->with('menus', $menus)->with('banners', $banner)->with('notices', $notices)->with('commits', $commits)->with('answers', $answers);
    }


    public function readMore($id)
    {
        //$notice = NoticeModel::find($id);
        $notice = NoticeModel::getNotices($id)->get()[0];
        //dd($notice->title_not);
        return view('front.ajax.03.readMore', ['notice' => $notice]);
    }

    public function showSubmenuAjax($id)
    {
        $submenu = SubmenuModel::find($id);
        return view('front.ajax.02.submenu', ['submenu' => $submenu]); 
    }
}
