@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('restaurants.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name:</label>
                                <label>
                                    <input class="form-control" type="text" name="name" value="{{ old('name') }}"
                                           required>
                                    {{--                                    @error('reg_number')--}}
                                    {{--                                    @foreach( $errors->get('reg_number') as $error)--}}
                                    {{--                                        <div class="alert alert-danger"> {{ $error }} </div>--}}
                                    {{--                                    @endforeach--}}
                                    {{--                                    @enderror--}}
                                </label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Code:</label>
                                <label>
                                    <input class="form-control" type="text" name="code" value="{{ old('code') }}"
                                           required>
                                </label>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Address:</label>
                                <label>
                                    <input class="form-control" type="text" name="address" value="{{ old('address') }}"
                                           required>
                                </label>
                            </div>

                            {{--                            <div  class="mb-3">--}}
                            {{--                                <label class="form-label">Owner_id:</label>--}}
                            {{--                                --}}{{--            <label class="form-label">Owner</label>--}}
                            {{--                                <label>--}}
                            {{--                                    --}}{{--                <select class="form-control name="owner_id">--}}
                            {{--                                    --}}{{--                    <option selected>Choose</option>--}}
                            {{--                                    --}}{{--                    @foreach($owners as $owner)--}}
                            {{--                                    --}}{{--                        <option value="{{$owner->id}}">{{$owner->name}} {{$owner->surname}}</option>--}}
                            {{--                                    --}}{{--                    @endforeach--}}
                            {{--                                    --}}{{--                </select>--}}
                            {{--                                    <input class="form-control" type="text" name="owner_id" value="{{ old('owner_id') }}" required>--}}
                            {{--                                </label>--}}
                            {{--                            </div>--}}

                            <button class="btn btn-primary">Add new</button>
                            <a class="btn btn-dark mx-3 float-end" href="{{ route('restaurants.index') }}">Go Back</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

