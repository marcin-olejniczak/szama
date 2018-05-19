<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'delivery_price', 'phone',
    ];

    public function orders(){
        return $this->hasMany('App\Order');
    }

    public function dishes(){
        return $this->hasMany('App\Dish');
    }
}
