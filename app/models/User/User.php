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
    protected $fillable = ['name', 'user', 'email', 'password', 'type', 'active', 'estatus'];
    protected $hidden = ['password', 'remember_token'];

}
