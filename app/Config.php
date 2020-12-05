<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    public function configDetail(){
        return $this->hasMany('App\ConfigDetail', 'config_id', 'id');
    }
}
