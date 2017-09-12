<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImageModel extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id_Img';
    protected $table = 'images';
    protected $dates = ['deleted_at'];
    /*
    public function notices()
    {
    	return $this->belongsToMany('\App\models\NoticeModel', 'images_notices')->withPivot('id_not', 'id_img');//->withTimestamps();
    }*/
    public function notices()
    {
        return $this->belongsToMany('\App\models\NoticeModel', 'images_notices', 'id_not', 'id_img');
    }

    public function images()
    {
        return $this->belongsToMany('\App\models\ImageModel');
    }
}
