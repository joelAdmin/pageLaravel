<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class BannerModel extends Model
{
    use SoftDeletes;
    protected $table = 'banners';
    protected $primaryKey = 'id_Ban';
    protected $guarded = ['id_Ban'];
    protected $dates = ['deleted_at'];
    protected $fillable = array('title_ban', 'content_ban', 'url_ban', 'status_ban');

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
                $query->where("title_ban", "LIKE", "%$search%");
                $query->orWhere('content_ban', "LIKE", "%$search%");
            }
        }
       
    }
    
}
