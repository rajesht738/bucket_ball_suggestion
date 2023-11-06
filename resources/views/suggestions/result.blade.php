@extends('layouts.master')
@section('main')
<div class="container">
    <h2>Following are Suggested Buckets</h2>

    @if (!empty($suggestedBuckets))
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
@endsection

