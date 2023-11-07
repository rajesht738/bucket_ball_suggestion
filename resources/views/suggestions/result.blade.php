@extends('layouts.master')
@section('main')
<div class="container">
    <h2>Following are Suggested Buckets</h2>

    @if (!empty($res))
    <div class="container row mt-20">
        <hr/>
        <div class="col-md-8">
        
        @if (!empty($res))
        
         <table class="table table-bordered">
                @foreach ($res as $bucketName => $bucketContents)
                <tr>   
                <td>Bucket-{{ $bucketContents->bucket->bucket_name }}</td>
                      <td>  
                            
                           {{$bucketContents->count}}     {{ $bucketContents->ball->color_name }} Balls ,
                           
                       
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
</div>
@endsection

