@extends('layouts.admin')

@section('title', 'Edit Previous Winner')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Previous Winner</h3>
                </div>
                @if(count($errors) > 0 )
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="p-0 m-0" style="list-style: none;">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif
            <!-- form start -->
                <form action="{{route("updatePreviousWinner",['id'=>$winner->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label >Cat Owner's Name</label>
                            <input type="text" class="form-control" value="{{$winner->name}}" name="name" required>
                        </div>
                        <div class="form-group">
                            <label >Cat's Name</label>
                            <input type="text" class="form-control" value="{{$winner->cat_name}}" name="cat_name" required>
                        </div>
                        <div class="form-group">
                            <label >Winning Date</label>
                            <input type="text" class="form-control" value="{{$winner->winningTime}}" name="winningTime" required>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
