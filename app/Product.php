<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel
{
    protected $hidden = ['pivot'];

    public function productConfigDetail(){
        return $this->belongsToMany('App\ConfigDetail', 'product_configs', 'pro_id', 'config_details_id');
    }

    public function category(){
        return $this->belongsTo('App\Category', 'cate_id', 'id');
    }
}
