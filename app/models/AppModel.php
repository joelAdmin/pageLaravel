<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use DB;

class AppModel extends Model
{
    public static function search_permission($request)
    {
       $search = $request['search'];
       $column = $request['column'];
       if (trim($column) != '')
       {
            if (trim($search) != '') 
            {
               $query = DB::table('permissions')->where($column, "LIKE", "%$search%");
               return $query;
            }else
            {
            	return  DB::table('permissions')->where($column, "LIKE", "%$search%");
            }
        }else
        {
            return  DB::table('permissions')->where('name', "LIKE", "%$search%");
        }
    }
}
