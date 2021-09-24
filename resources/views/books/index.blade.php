<!-- Extends template page-->
@extends('layouts.master')

<!-- Specify content -->
@section('content')

<div class="main-container col1-layout">
    <div class="main">
        <div class="col-main">
            <div class="title">
                <h3>Danh sách ngôn ngữ</h3>
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

                        <a class='btn btn-info float-right' href="{{route('books.create')}}">Add</a>
                        
                    </div>
                    <table class="table" >
                        <thead>
                            <tr>
                                <th width='20%'>Name</th>
                                <th width='20%'>Author</th>
                                <th width='20'>Publisher</th>
                                <th width='10%'>DDC</th>
                                <th width='10%'>Status</th>
                                <th width='20%'>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                            <tr>
                                <td>{{ $book->name }}</td>
                                <td>{{ $book->author_name}}</td>
                                <td>{{ $book->publishers_name}}</td>
                                <td>{{ $book->ddc_name}}</td>
                                <td>{{ $book->status_name}}</td>
                                <td>
                                    <!-- Edit -->
                                    <a href="{{ route('books.edit',$book->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <!-- Delete -->
                                    <a href="{{ route('books.delete',$book->id) }}" class="btn btn-sm btn-danger">Delete</a>
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
