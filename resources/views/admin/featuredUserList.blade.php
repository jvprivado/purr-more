@extends('layouts.admin')

@section('title', 'Featured Users')

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
                    <h3 class="card-title">Featured Users</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if(count($entrants)>0)
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Cat Name</th>
                                <th>Pur Audio/Video</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($entrants as $enter)
                                <tr>
                                    <td>{{$enter->firstname}}</td>
                                    <td>{{$enter->lastname}}</td>
                                    <td>{{$enter->email}}</td>
                                    <td>{{$enter->phone}}</td>
                                    <td>{{$enter->cat_names}}</td>
                                    <td><a href="{{route('previewPurr',['id'=>$enter->id])}}">Purr File</a></td>
                                    <td><a href="{{route('deleteFeaturedUser',['id'=>$enter->id])}}"><i class="fas fa-trash"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    @else
                        <strong>No Entries Found</strong>
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
