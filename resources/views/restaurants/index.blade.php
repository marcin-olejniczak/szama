@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Restaurant Management</h2>
            </div>
            <div class="pull-right">
                @can('restaurant-create')
                    <a class="btn btn-success" href="{{ route('restaurants.create') }}"> Create New Restaurant</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Address</th>
            <th>Delivery price</th>
            <th>Phone</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($restaurants as $key => $restaurant)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $restaurant->name }}</td>
                <td>{{ $restaurant->address }}</td>
                <td>{{ $restaurant->delivery_price }}</td>
                <td>{{ $restaurant->phone }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('restaurants.show',$restaurant->id) }}">Show</a>
                    @can('restaurant-edit')
                        <a class="btn btn-primary" href="{{ route('restaurants.edit',$restaurant->id) }}">Edit</a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>



@endsection