<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel
{
    public function indexProducts(){
        return $this->products()->latest()->nPerGroup('cate_id',4);
    }
    public function products(){
        return $this->hasMany('App\Product', 'cate_id', 'id');
    }
}
