<!-- Extends template page-->
@extends('layouts.master')

<!-- Specify content -->
@section('content')

<div class="main-container col1-layout">
    <div class="main">
        <div class="col-main">
            <div class="title">
                <h3>DDC List</h3>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <!-- Alert message (start) -->
                    @if(Session::has('message'))
                    <div class="alert {{ Session::get('alert-class') }}">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <!-- Alert message (end) -->

                    <div class='actionbutton'>

                        <a class='btn btn-info float-right' href="{{route('tpddcs.create')}}">Add</a>
                        
                    </div>
                    <table class="table" >
                        <thead>
                            <tr>
                                <th width='40%'>Name</th>
                                <th width='40%'>DDC</th>
                                <th width='20%'>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tpddcs as $tpddc)
                            <tr>
                                <td>{{ $tpddc->ddc_name }}</td>

                                <td>
                                    {{$tpddc->ddc}}
                                 
                                </td>
                                <td>
                                    <!-- Edit -->
                                    <a href="{{ route('tpddcs.edit',[$tpddc->id]) }}" class="btn btn-sm btn-info">Edit</a>
                                    <!-- Delete -->
                                    <a href="{{ route('tpddcs.delete',$tpddc->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@stop
