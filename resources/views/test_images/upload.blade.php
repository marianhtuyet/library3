<!-- Extends template page-->
@extends('layouts.master')

<!-- Specify content -->
@section('content')

<div class="main-container col1-layout">
    <div class="main">
        <div class="col-main">
            <div class="title">
                <h3>test_imagess List</h3>
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
                        <a class='btn btn-info float-right' href="{{route('test_images.create')}}">Add</a>
                    </div>
                    <table class="table" >
                        <thead>
                            <tr>
                                <th width='40%'>Image</th>
                                <th width="40%">Author</th>
                                <th width='20%'>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($test_images as $test_images)

                            <tr>
                                <td><img src=" {{ $test_images->img_src }}" alt=" {{ $test_images->img_alt }}" width="100" height="100"></td>
                                <td>
                                  {{$test_images->name}}
                              </td>

                              <td>
                                <!-- Edit -->
                                <!-- <a href="/" class="btn btn-sm btn-info">Edit</a> -->
                                <!-- Delete -->
                                <a href="/" class="btn btn-sm btn-danger">Delete</a>
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
