<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class contactModel extends Model
{
    use SoftDeletes;
    protected $table = 'contacts';
    protected $primaryKey = 'id_Con';
    protected $guarded = ['id_Con'];
    protected $dates = ['deleted_at'];
}
