@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Restaurant</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('restaurants.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <p>{{ $restaurant->name }}</p>
                <strong>Address:</strong>
                <p>{{ $restaurant->address }}</p>
                <strong>Delivery price:</strong>
                <p>{{ $restaurant->delivery_price }}$</p>
                <strong>Phone:</strong>
                <p>{{ $restaurant->phone }}</p>

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <h2>Dishes:</h2>
            <div class="form-group">

            </div>
        </div>
    </div>
@endsection