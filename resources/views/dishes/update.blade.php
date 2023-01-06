@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('dishes.update', $dish->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Image:</label>
                                <label>
                                    <input class="form-control" type="file" name="image">
                                </label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Name:</label>
                                <label>
                                    <input class="form-control" type="text" name="name" value="{{ $dish->name }}" required>
                                </label>
                            </div>
                            <div  class="mb-3">
                                <label class="form-label">Description:</label>
                                <label>
                                    <input class="form-control" type="text" name="description"  value="{{ $dish->description }}" required>
                                </label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Restaurant name:</label>
                                <label>
                                    <select name="restaurant_id" class="form-select">
                                        @foreach($restaurants as $restaurant)
                                            <option  value="{{$restaurant->id}}" {{ isset($dish)&&($restaurant->id==$dish->restaurant_id)?'selected':'' }}> {{ $restaurant->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <button class="btn btn-primary">Update</button>
                            <a class="btn btn-dark mx-3 float-end" href="{{ route('dishes.index') }}">Go Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

