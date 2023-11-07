@extends('layouts.master')
@section('main')
    <div class="container">
        <h1>Create Ball Color</h1>

    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    {{ $message }}
                </div>
                @endif
                <div class="card mt-3 p-3">
                    <form class="row g-3" method="POST" action="{{ route('color.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group row justify-content-center">
                            <label for="color_name" class="col-md-3 col-form-label" >Color Name</label>
                            <div class="col-sm-4">
                            <input type="text" name="color_name" value="{{old('color_name')}}" class="form-control" id="color_name">
                           @if ($errors->has('color_name'))
                               <span class="text-danger">{{$errors->first('color_name')}}</span>
                           @endif
                            </div>
                           
                            </div>
                           
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      

                     
                    </form>
                </div>
        </div>
    </div>
  @stop

