@extends('layouts.admin')

@section('title', 'Blogs List')

@section('styles')
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{route('addBlog')}}" class="btn btn-primary">Add Blog</a>
            <br>
            <br>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Blogs List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if(count($blogs)>0)
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                    <td>{{$blog->title}}</td>
                                    <td><img src="{{$blog->image}}" height="100" width="150"></td>

                                    <td>{!!  \Illuminate\Support\Str::of($blog->description)->words(20) !!}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a href="{{route('editBlog',['id'=>$blog->id])}}"> <i class="fas fa-pencil-alt"></i></a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="{{route('deleteBlog',['id'=>$blog->id])}}"><i class="fas fa-trash"></i></a>
                                            </div>
                                            <div class="col-md-3">

                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    @else
                        <strong>No Blog Found</strong>
                    @endif
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.col -->
    </div>
@endsection

@section('scripts')
    <!-- Page level plugins -->

    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


    <script>
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false
        })
    </script>
@endsection
