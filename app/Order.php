<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'status', 'user_id', 'restaurant_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
}
    public function restaurant(){
        return $this->belongsTo('App\Restaurant');
    }

    public function dishes(){
        return $this->hasMany('App\Dish');
    }
}
