@extends('layouts.master')

@section('main')
<div class="container">
        <h1>Bucket List</h1>
        <div class="col-md-12 d-flex justify-content-center"><a href={{ route('bucket.create') }}
                class="btn btn-primary">Create Bucket</a>
            </div>

<div class="row justify-content-center">
    <div class="col-md-12">
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>

                <th>#</th>
                <th>Bucket Name</th>
                <th>Bucket Volume(In inches)</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($buckets as $bucket )
            <tr>
                <td>{{$loop->index + 1}}</td>
               
                <td><a href="/bucket/{{$bucket->id}}/details">{{$bucket->bucket_name}}</a></td>
                <td>{{$bucket->bucket_volume}}</td>
                
                <td>
                    <div class="d-inline-block"><a href="/bucket/{{$bucket->id}}" class="btn btn-primary">Edit</a></div>
                    <div class="d-inline-block">
                        <form  action="/bucket/{{$bucket->id}}/delete" method="Post">
                            @csrf
                            @method('DELETE')
                            <div class="col-12 justify-content-center">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach


        </tbody>
        <tfoot>

        </tfoot>
    </table>
</div>
</div>
</div>
@endsection
