@extends('layouts.admin')

@section('title', 'Products List')

@section('styles')
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{route('addProduct')}}" class="btn btn-primary">Add Product</a>
            <br>
            <br>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Products List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if(count($products)>0)
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Image</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->subtitle}}</td>
                                    <td><img src="{{$product->image}}" height="100" width="150"></td>

                                    <td><a href="{{$product->link}}">Product Link</a></td>
                                    <td><a href="{{route('editProduct',['id'=>$product->id])}}"> <i class="fas fa-pencil-alt"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    @else
                        <strong>No Product Found</strong>
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
