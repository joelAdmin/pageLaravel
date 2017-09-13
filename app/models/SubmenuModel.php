<?php

namespace App\models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SubmenuModel extends Model
{
    use SoftDeletes;
    protected $table = 'submenus';
    protected $date = ['deleted_at'];
    protected $primaryKey = 'id_Sub';
    protected $guarded = ['id_Sub', 'get_submenu', 'position'];

    public static function getSubmenuAll()
    {
    	return  DB::table('submenus')->orderBy('position_sub', 'asc')->pluck('etiqueta_sub', 'id_Sub');
    }

    public function scopeGetSubmenu($query, $id_Men)
    {

    	$query->where('id_men', '=', $id_Men)->where('deleted_at', "=", null);
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
                $query->where("etiqueta_sub", "LIKE", "%$search%");
                $query->orWhere('position_sub', "LIKE", "%$search%");
                $query->orWhere('url_sub', "LIKE", "%$search%");
                $query->orWhere('event_sub', "LIKE", "%$search%");
            }
        }
       
    }
}