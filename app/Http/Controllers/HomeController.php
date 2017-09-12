<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class HomeController extends Controller{
    
    public function _construct(){
       // $this->middleware('RedirectIfAuthenticated');
    }

    public function index(){
        return View('back.backHome');
    }
    
    public function getId($id1, $id2){
        return "<p>id1 es igual a " . $id1 . "</p><p>id2 es igual a " . $id2 . "</p>";
    }
    
    public function showView(){
        $msg = "Aprendiendo Laravel 5";
        $array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        return View('home.showview', ['msg' => $msg, 'array' => $array]);
    }
}