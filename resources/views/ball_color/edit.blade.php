@extends('layouts.master')

@section('main')

    <div class="container">
        <h1>Edit Color</h1>

    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    {{ $message }}
                </div>
                @endif
                <div class="card mt-3 p-3">
                    <form class="row g-3" method="POST" action="/color/{{ $color->id }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6">
                            <label for="color_name" class="form-label">Color Name</label>
                            <input type="text" name="color_name" value="{{old('color_name', $color->color_name)}}" class="form-control" id="color_name">
                           @if ($errors->has('color_name'))
                               <span class="text-danger">{{$errors->first('color_name')}}</span>
                           @endif
                        </div>
                        <div class="col-12 justify-content-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
 @stop
