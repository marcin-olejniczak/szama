<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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
        $restaurants = Restaurant::latest()->paginate(5);
        return view('restaurants.index',compact('restaurants'));
    }

    public function show($id)
    {
        $restaurant = Restaurant::find($id);

        return view('restaurants.show',compact('restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'delivery_price' => ['required', 'regex:/^[0-9]+(?:\.[0-9]+)?$/','min:0'],
            'phone' => 'required|min:9',
        ]);


        $restaurant = Restaurant::create(Input::all());


        return redirect()->route('restaurants.index')
            ->with('success','Restaurant created successfully');
    }

}
