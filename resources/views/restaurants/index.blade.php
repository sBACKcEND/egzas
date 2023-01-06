@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header"><h3>Restaurants</h3></div>
                    <div class="card-body">
                        <div class="flex-col flex-grow mb-4">
                            <input type="search" class="search-field mb-0" placeholder="Search…" value=""
                                   name="s" autocomplete="off">
                            <input type="hidden" name="post_type" value="restaurant">
                        </div>
{{--                        <div class="flex-col flex-grow mb-4">--}}
{{--                            <form class="ordering" method="get">--}}
{{--                                <select name="order" class="order" aria-label="order">--}}
{{--                                    <option value="menu_order" selected="selected">Default sorting</option>--}}
{{--                                    <option value="popularity">Sort by name</option>--}}
{{--                                    <option value="rating">Sort by address</option>--}}
{{--                                    <option value="date">Sort by city</option>--}}
{{--                                    <option value="price">Sort by price: low to high</option>--}}
{{--                                    <option value="price-desc">Sort by price: high to low</option>--}}
{{--                                </select>--}}
{{--                                <input type="hidden" name="paged" value="1">--}}
{{--                            </form>--}}
{{--                        </div>--}}
                        @can ('create', \App\Models\Restaurant::class)
                            <a class="btn btn-primary" href="{{ route('restaurants.create') }}">Add new restaurant</a>
                        @endcan
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Address</th>
                                <th></th>
                                <th colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($restaurants as $restaurant)
                                <tr>
                                    <td>{{ $restaurant->name }}</td>
                                    <td>{{ $restaurant->code }}</td>
                                    <td>{{ $restaurant->address }}</td>
                                    <td><a href="{{ route('restaurantDishes', $restaurant->id) }}"
                                           class="btn btn-warning">Menu</a>
                                    </td>
                                    {{--                                    <td><a href="{{ route('warehouseProducts',$warehouse->id) }}" class="btn btn-warning">Products</a></td>--}}
                                    <td>
                                        @can ('update', $restaurant)
                                            <a class="btn btn-success"
                                               href="{{ route('restaurants.edit', $restaurant->id) }}">Edit</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can ('delete', $restaurant)
                                            <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


