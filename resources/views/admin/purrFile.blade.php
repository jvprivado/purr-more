@extends('layouts.admin')

@section('title', 'Purr Preview')

@section('content')
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Purr Preview</h3>
                </div>
                @if($entrant!=null)
                    <div class="card-body">

                        <video width="840" height="400" controls>
                            <source src="{{$entrant->pur}}" >
                        </video>
                    </div>
                    <!-- /.card-body -->
                @else
                    <div class="card-body">
                        <strong>No File Available</strong>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection



