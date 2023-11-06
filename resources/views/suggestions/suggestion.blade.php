@extends('layouts.master')

@section('main')
<div class="container">
    <h2>Suggest Buckets</h2>

    <form method="POST" action="{{ route('ball-and-bucket.suggest-buckets') }}">
        @csrf
        <div class="form-group">
            <label for="red_balls">Number of Red Balls</label>
            <input type="number" name="red_balls" id="red_balls" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="blue_balls">Number of Blue Balls</label>
            <input type="number" name="blue_balls" id="blue_balls" class="form-control" required>
        </div>
        <!-- Add more fields for other ball colors if needed -->
        <button type="submit" class="btn btn-success">Calculate Suggested Buckets</button>
    </form>
</div>
@endsection
