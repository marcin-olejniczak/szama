<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:restaurant-list');
        $this->middleware('permission:restaurant-create', ['only' => ['create','store']]);
        $this->middleware('permission:restaurant-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:restaurant-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Restaurant::latest()->paginate(5);
        return view('restaurant.index',compact('products'));
    }

}
