<?php

namespace App\models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
//use Illuminate\Database\Eloquent\Builder;
//use Illuminate\Database\Query\Builder;

class NoticeModel extends Model
{
    use SoftDeletes;
    protected $table = 'notices';
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id_Not';
    //protected $fillable = ['name', 'description'];
    protected $guarded = ['id_Not', 'url_image'];

    public function image_noticess()
    {
        return $this->belongsToMany('\App\models\ImageModel', 'images_notices', 'id_not', 'id_img');
    }
    /*
    public function withtrashed()
    {
        return $this->belongsTo('App\models\NoticeModel')->withTrashed();
    }*/

    /*
    public function image_notices()
    {
        return $this->belongsToMany('\App\models\ImageModel', 'images_notices', 'id_img', 'status_notImg');
    }*/
    
    public static function getCategory()
    {
    	$category = DB::table('category_notices')->orderBy('name_cat', 'asc')->pluck('name_cat', 'id_Cat');
    	return $category;
    }

    public static function getScope()
    {
        $scope = DB::table('scope_notices')->orderBy('name_sco', 'asc')->pluck('name_sco', 'id_Sco');
        return $scope;
    }

    public function scopeSearch($query, $request)
    {
       $search = $request['search'];
       $column = $request['column'];
       if (trim($column) != '')
       {
            if (trim($search) != '') 
            {
                //$query->where($column, "LIKE", "%$search%");
                $query->join('images_notices', 'notices.id_Not', '=', 'images_notices.id_not');
                $query->join('images', 'images.id_Img', '=', 'images_notices.id_img');
                $query->where('notices.deleted_at', "=", null);
                $query->where($column, "LIKE", "%$search%");
            }else
            {
                $query->join('images_notices', 'notices.id_Not', '=', 'images_notices.id_not');
                $query->join('images', 'images.id_Img', '=', 'images_notices.id_img');
                $query->where('notices.deleted_at', "=", null);
            }
        }else
        {
            if (trim($search) != '') 
            {
                $query->join('images_notices', 'notices.id_Not', '=', 'images_notices.id_not');
                $query->join('images', 'images.id_Img', '=', 'images_notices.id_img');
                $query->where('notices.deleted_at', "=", null);
                $query->where("author_not", "LIKE", "%$search%");
                $query->orWhere('title_not', "LIKE", "%$search%");
                $query->orWhere('inlet_not', "LIKE", "%$search%");
                $query->orWhere('type_not', "LIKE", "%$search%");
            }else
            {
                $query->join('images_notices', 'notices.id_Not', '=', 'images_notices.id_not');
                $query->join('images', 'images.id_Img', '=', 'images_notices.id_img');
                $query->where('notices.deleted_at', "=", null);
            }
        }
       
    }

    public static function getNotices($request=null)
    {
        if (trim($request) != '') 
        {
            $query = DB::table('notices')->join('images_notices', 'notices.id_Not', '=', 'images_notices.id_not')->join('images', 'images.id_Img', '=', 'images_notices.id_img')->where('notices.id_Not', "=", $request)->where('notices.deleted_at', "=", null);
        }else
        {
            $query = DB::table('notices')->join('images_notices', 'notices.id_Not', '=', 'images_notices.id_not')->join('images', 'images.id_Img', '=', 'images_notices.id_img')->where('notices.deleted_at', "=", null);
        }
        return $query;
    }

    public static function getCommit()
    {
        /*$query = DB::table('notices')->join('images_notices', 'notices.id_Not', '=', 'images_notices.id_not')->join('images', 'images.id_Img', '=', 'images_notices.id_img')->leftjoin('commits_notices_users', 'notices.id_Not', '=', 'commits_notices_users.id_not')->leftjoin('commits', 'commits.id', '=', 'commits_notices_users.id_com');*/
        $query = DB::table('commits')->join('commits_notices_users', 'commits.id', '=', 'commits_notices_users.id_com')->join('users', 'users.id', '=', 'commits_notices_users.id_use');//->orderBy('commits_notices_users.id', 'DESC');
        /*->groupBy('notices.id_Not', 'notices.title_not', 'images.name_img', 'notices.inlet_not', 'commits.commit')->select('notices.id_Not', 'notices.title_not', 'images.name_img', 'notices.inlet_not', 'commits.commit');*/
        return $query;
    }

    public static function getAnswer()
    {
        $query = DB::table('answers')->join('answers_commits_users', 'answers.id', '=', 'answers_commits_users.id_ans')->join('users', 'users.id', '=', 'answers_commits_users.id_use');
        return $query;
    }

    public static function category()
    {
      //$users = Pilot::all()->lists('nif');
      return'hola';
    }
}
