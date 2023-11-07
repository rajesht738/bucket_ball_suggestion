@extends('layouts.master')

@section('main')
<div class="container">
        <h1>Ball List</h1>
        <div class="col-md-12 d-flex justify-content-center"><a href={{ route('color.create') }}
                class="btn btn-primary">Create Ball Color</a>
            </div>

<div class="row justify-content-center">
    <div class="col-md-12">
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>

                <th>#</th>
                <th>Ball Name</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($colors as $color )
            <tr>
                <td>{{$loop->index + 1}}</td>
               
                <td><a href="/color/{{$color->id}}/details">{{$color->color_name}}</a></td>
                 <td>
                    <div class="d-inline-block"><a href="/color/{{$color->id}}" class="btn btn-primary">Edit</a></div>
                    <div class="d-inline-block">
                        <form  action="/color/{{$color->id}}/delete" method="Post">
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
