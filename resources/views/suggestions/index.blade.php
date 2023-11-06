@extends('layouts.master')

@section('main')
<div class="container mt-20">
  
    <div class="row justify-content-center ">
        <div class="col-md-5 border border-primary gap-2">
    <h3>Bucket Suggestion</h3>
    <form method="POST" action="{{ route('suggestion.suggest-buckets') }}">
        @csrf
        <div class="form-group row">
            <label for="pink_balls" class="col-sm-2 col-form-label">Pink</label>
            <div class="col-sm-5">
            <input type="number" name="pink_balls" id="pink_balls" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="red_balls" class="col-sm-2 col-form-label bg-red" >Red</label>
            <div class="col-sm-5">
            <input type="number" name="red_balls" id="red_balls" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="blue_balls" class="col-sm-2 col-form-label">Blue</label>
            <div class="col-sm-5">
            <input type="number" name="blue_balls" id="blue_balls" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="orange_balls" class="col-sm-2 col-form-label">Orange</label>
            <div class="col-sm-5">
            <input type="number" name="orange_balls" id="orange_balls" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="green_balls" class="col-sm-2 col-form-label">Green</label>
            <div class="col-sm-5">
            <input type="number" name="green_balls" id="green_balls" class="form-control" required>
            </div>
        </div>
        <!-- Add more fields for other ball colors if needed -->
        <button type="submit" class="btn btn-success m-2">PLACE BALLS IN BUCKET</button>
    </form>
    </div>
</div>
</div>
@endsection