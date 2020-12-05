<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfigDetail extends Model
{
    protected $hidden = ['pivot'];
    public function config(){
        return $this->belongsTo('App\Config' ,'config_id', 'id');
    }
    public function productsConfig(){
        return $this->belongsToMany('App\Product', 'product_configs', 'config_details_id', 'id');
    }
}
