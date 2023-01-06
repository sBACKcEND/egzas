@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('restaurants.update', $restaurant->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Name:</label>
                                <label>
                                    <input class="form-control" type="text" name="name" value="{{ $restaurant->name }}" required>
                                    {{--                                    @error('reg_number')--}}
                                    {{--                                    @foreach( $errors->get('reg_number') as $error)--}}
                                    {{--                                        <div class="alert alert-danger"> {{ $error }} </div>--}}
                                    {{--                                    @endforeach--}}
                                    {{--                                    @enderror--}}
                                </label>
                            </div>

                            <div  class="mb-3">
                                <label class="form-label">Code:</label>
                                <label>
                                    <input class="form-control" type="text" name="code"  value="{{ $restaurant->code }}" required>
                                </label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address:</label>
                                <label>
                                    <input class="form-control" type="text" name="address" value="{{ $restaurant->address }}" required>
                                </label>
                            </div>
                            {{--                            <div  class="mb-3">--}}
                            {{--                                <label class="form-label">Owner_id:</label>--}}
                            {{--                                <label>--}}
                            {{--                                    <input class="form-control" type="text" name="owner_id"  value="{{ $car->owner_id }}" required>--}}
                            {{--                                </label>--}}
                            {{--                            </div>--}}

                            <button class="btn btn-primary">Update</button>
                            <a class="btn btn-dark mx-3 float-end" href="{{ route('restaurants.index') }}">Go Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

