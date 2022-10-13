@extends('layouts.admin')

@section('title', 'Recent Banners')

@section('styles')
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Banners</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if(count($banners)>0)
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Banner</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($banners as $banner)
                                <tr>
                                    <td><img src="{{$banner->banner}}" height="200" width="500"></td>

                                    <td>
                                        <div class="row">
                                            <a href="{{route('makeOld',['id'=>$banner->id])}}" class="btn btn-sm btn-danger">Make Old</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    @else
                        <strong>No Recent Banner Found</strong>
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
