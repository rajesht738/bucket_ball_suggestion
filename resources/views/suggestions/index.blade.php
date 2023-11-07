@extends('layouts.master')

@section('main')
<div class="container mt-20">
  
    <div class="row justify-content-center ">
        <div class="col-md-5 border border-primary gap-2">
    <h3>Bucket Suggestion</h3>
    <form method="POST" action="{{ route('suggestion.suggest-buckets') }}">
        @csrf
       
        @foreach ($balls as $ball )
            
       
        <div class="form-group row">
            <input type="hidden" name="balls_id[]" value="{{$ball->id}}" id="balls_id" class="form-control">
            <input type="hidden" name="balls_colors[]" value="{{$ball->color->color_name}}" id="balls_id" class="form-control">
            <label for="balls_count" class="col-sm-2 col-form-label">{{$ball->color->color_name}}</label>
            
            <div class="col-sm-5">
            <input type="number" name="balls_count[]" value="{{old('balls_count')}}" id="balls_count" class="form-control" required>
            </div>
        </div>
        @endforeach
        <button type="submit" class="btn btn-success m-2">PLACE BALLS IN BUCKET</button>
    </form>
    </div>
</div>
</div>
@if (!empty($suggestedBuckets))
<div class="container row mt-20">
    <hr/>
    <div class="col-md-8">
    
    @if (!empty($suggestedBuckets))
    
    <h2>Following are Suggested Buckets</h2>

   
        <table class="table table-bordered">
            @foreach ($suggestedBuckets as $bucketName => $bucketContents)
            <tr>   
            <td>Bucket-{{ $bucketName }}</td>
                  <td>  
                        @foreach ($bucketContents as $color => $count)
                            {{ $count }} {{ $color }} Balls ,
                        @endforeach
                   
                </td>
            </tr>
            @endforeach
        </table>
    @else
        <p>No suggested buckets available for the given number of balls.</p>
    @endif
    </div>
    <div class="col-md-4">
    @if (!empty($extraBalls))
        <h2>Extra Balls</h2>
        <ul>
            @foreach ($extraBalls as $color => $count)
                <li>{{ $count }} {{ $color }} Balls</li>
            @endforeach
        </ul>
    @else
        <p>No extra balls.</p>
    @endif
    </div>
</div>
@endif
@endsection