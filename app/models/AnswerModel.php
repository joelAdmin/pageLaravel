<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnswerModel extends Model
{
    use SoftDeletes;
    protected $table = 'answers';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function commits_users()
    {
        return $this->belongsToMany('\App\models\CommitModel', 'answers_commits_users', 'id_ans', 'id_com')->withPivot('id_use')->withTimestamps();
    }
}
