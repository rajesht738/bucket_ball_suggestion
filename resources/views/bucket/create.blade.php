@extends('layouts.master')
@section('main')
    <div class="container">
        <h1>Create Bucket</h1>

    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    {{ $message }}
                </div>
                @endif
                <div class="card mt-3 p-3">
                    <form class="row g-3" method="POST" action="{{ route('bucket.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label for="bucket_name" class="form-label">Bucket Name</label>
                            <input type="text" name="bucket_name" value="{{old('bucket_name')}}" class="form-control" id="bucket_name">
                           @if ($errors->has('bucket_name'))
                               <span class="text-danger">{{$errors->first('bucket_name')}}</span>
                           @endif
                        </div>
                        <div class="col-md-6">
                            <label for="bucket_volume" class="form-label">Bucket Volume(In inches)</label>
                            <input type="text" name="bucket_volume" value="{{old('bucket_volume')}}" class="form-control" id="bucket_volume">
                            @if ($errors->has('bucket_volume'))
                            <span class="text-danger">{{$errors->first('bucket_volume')}}</span>
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

