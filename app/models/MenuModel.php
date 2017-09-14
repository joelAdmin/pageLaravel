<?php

namespace App\models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MenuModel extends Model
{
    use SoftDeletes;
    protected $table = 'menus';
    protected $date = ['deleted_at'];
    protected $primaryKey = 'id_Men';
    //protected $fillable = ['name', 'description'];
    protected $guarded = ['id_Men', 'get_menu', 'position'];

    public static function getMenu()
    {
    	return  DB::table('menus')->where('deleted_at', "=", null)->orderBy('position_men', 'asc')->pluck('etiqueta_men', 'id_Men');
    }

    public static function menuAll()
    {
        return  DB::table('menus')->where('deleted_at', "=", null)->orderBy('position_men', 'asc')->get();
    }

    public static function getMenuAll()
    {
        return  DB::table('menus')->leftJoin('submenus', 'submenus.id_men', '=', 'menus.id_Men')->select('submenus.id_men', 'menus.id_Men', 'menus.etiqueta_men', 'submenus.etiqueta_sub', 'submenus.event_sub', 'submenus.id_Sub')->get();
    }

    public function scopeSearch($query, $request)
    {
       $search = $request['search'];
       $column = $request['column'];
       if (trim($column) != '')
       {
            if (trim($search) != '') 
            {
                $query->where($column, "LIKE", "%$search%");
            }
        }else
        {
            if (trim($search) != '') 
            {
                $query->where("etiqueta_men", "LIKE", "%$search%");
                $query->orWhere('position_men', "LIKE", "%$search%");
                $query->orWhere('url_men', "LIKE", "%$search%");
                $query->orWhere('event_men', "LIKE", "%$search%");
            }
        }
       
    }
}
