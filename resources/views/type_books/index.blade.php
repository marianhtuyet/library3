<!-- Extends template page-->
@extends('layouts.master')

<!-- Specify content -->
@section('content')

<div class="main-container col1-layout">
    <div class="main">
        <div class="col-main">
            <div class="title">
                <h3>Type books List</h3>
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

                        <a class='btn btn-info float-right' href="{{route('type_books.create')}}">Add</a>
                        
                    </div>
                    <table class="table" >
                        <thead>
                            <tr>
                                <th width='40%'>Name</th>
                                <th width='20%'>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($type_books as $type_books)
                            <tr>
                                <td>{{ $type_books->name }}</td>
                                <td>
                                    <!-- Edit -->
                                    <a href="{{ route('type_books.edit',[$type_books->id]) }}" class="btn btn-sm btn-info">Edit</a>
                                    <!-- Delete -->
                                    <a href="{{ route('type_books.delete',$type_books->id) }}" class="btn btn-sm btn-danger">Delete</a>
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
