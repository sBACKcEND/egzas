@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header"><h3>Dishes **Užsakymai priimami numeriu 8 600 333333**</h3></div>
                    <div class="card-body">
{{--                        <div class="flex-col flex-grow mb-4">--}}
{{--                            <input type="search" class="search-field mb-0" placeholder="Search…" value=""--}}
{{--                                   name="s" autocomplete="off">--}}
{{--                            <input type="hidden" name="post_type" value="dish">--}}
{{--                        </div>--}}
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
                        @can ('create', \App\Models\Dish::class)
                            <a href="{{ route('dishes.create') }}" class="btn btn-primary">Add new dish</a>
                        @endcan
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Restaurant</th>
                                <th colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dishes as $dish)
                                <tr>
                                    <td> <img src="{{ asset('storage/dishes/'.$dish->id.".jpg") }}" style="width: 150px;"></td>
                                    <td>{{ $dish->name }}</td>
                                    <td>{{ $dish->description }}</td>
                                    <td>{{ $dish->restaurant->name }}</td>
                                    <td>
                                        @can ('update', $dish)
                                            <a href="{{ route('dishes.edit', $dish->id) }}" class="btn btn-success">Edit</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can ('delete', $dish)
                                            <form method="post" action="{{ route('dishes.destroy', $dish->id) }}">
                                                @csrf
                                                @method('delete')
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

