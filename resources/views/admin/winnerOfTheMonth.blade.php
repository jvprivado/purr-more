@extends('layouts.admin')

@section('title', 'Winner Of The Month')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Winner Of The Month</h3>
                </div>
                @if($entrant!=null)
                    <div class="card-body">
                        <strong>{{$entrant->firstname}} {{$entrant->lastname}}</strong>
                        <iframe width="500" height="315" src="{{$entrant->pur}}" allowfullscreen></iframe>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button class="btn btn-primary" onclick="makePreviousWinner({{$entrant->id}})">Make Previous Winner</button>

                    </div>
                @else
                    <div class="card-body">
                    <strong>No Winner Available</strong>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function makePreviousWinner(id){
            let url = "{{route('makePreviousWinner',':id')}}";
            url = url.replace(':id', id);
            document.location.href=url;
        }
    </script>
@endsection


