@extends('layouts.master')
@section('main')
    <div class="container">
        <h1>Create Ball</h1>

    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    {{ $message }}
                </div>
                @endif
                <div class="card mt-3 p-3">
                    <form class="row g-3" method="POST" action="{{ route('ball.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        
                        <div class="col-md-6">
                            <label for="color_id" class="form-label">Ball Color</label>
                         
                            <select class="form-control" name="color_id" id="color_id">
                                <option value="">Select Ball Color</option>
                                @foreach ($colors as $color)
                                   <option value="{{$color->id}}">{{$color->color_name}}</option>
                                @endforeach
                             
                              </select>
                           
                           @if ($errors->has('color_id'))
                               <span class="text-danger">{{$errors->first('color_id')}}</span>
                           @endif
                        </div>
                        <div class="col-md-6">
                            <label for="ball_volume" class="form-label">Ball Volume(In inches)</label>
                            <input type="text" name="ball_volume" value="{{old('ball_volume')}}" class="form-control" id="ball_volume">
                            @if ($errors->has('ball_volume'))
                            <span class="text-danger">{{$errors->first('ball_volume')}}</span>
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

