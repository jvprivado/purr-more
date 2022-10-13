@extends('layouts.admin')

@section('title', 'Add New Product')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add New Product</h3>
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
                <form action="{{route("uploadProduct")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label >Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Product Title" required>
                        </div>

                        <div class="form-group">
                            <label >Subtitle</label>
                            <input type="text" class="form-control" name="subtitle" placeholder="Enter Product Subtitle" >
                        </div>

                        <div class="form-group">
                            <label >Image</label>
                            <input type="file" class="form-control" name="image" required>
                        </div>
                        <div class="form-group">
                            <label >Link</label>
                            <input type="text" class="form-control" name="link" placeholder="Enter Product Link" required>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
