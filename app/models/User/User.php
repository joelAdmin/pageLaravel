<?php

namespace App\\models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'user', 'email', 'type', 'avatar', 'provider', 'provider_id'];
    protected $hidden = ['remember_token'];

    public function scopesearch()
    {
       return 1;
       //dd($request);
       /*
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
                $query->where("user", "LIKE", "%$search%");
                $query->orWhere('email', "LIKE", "%$search%");
                $query->orWhere('type', "LIKE", "%$search%");
            }
        }*/  
    }
}
