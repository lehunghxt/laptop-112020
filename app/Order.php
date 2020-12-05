<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function customer(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function orderDetail(){
        return $this->hasMany('App\OrderDetail', 'order_id', 'id');
    }
}
