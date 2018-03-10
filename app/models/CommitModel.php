<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommitModel extends Model
{
    use SoftDeletes;
    protected $table = 'commits';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function notices_users()
    {
        return $this->belongsToMany('\App\models\NoticeModel', 'commits_notices_users', 'id_com', 'id_not')->withPivot('id_use')->withTimestamps();
    }
}
