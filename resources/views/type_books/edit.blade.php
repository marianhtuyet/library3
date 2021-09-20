<!-- Extends template page -->
@extends('layouts.master')

<!-- Specify content -->
@section('content')

<div class="main-container col1-layout">
    <div class="main">
        <div class="col-main">
            <div class="title">
                <h3>Edit type books</h3>
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


                  <div class="actionbutton">

                    <a class='btn btn-info float-right' href="{{route('type_books')}}">List</a>

                </div>

                <form action="{{route('type_books.update',[$type_books->id])}}" method="post" >
                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" class="form-control col-md-12 col-xs-12" name="name" placeholder="Enter type_books name" required="required" type="text" value="{{old('name',$type_books->name)}}">

                            @if ($errors->has('name'))
                            <span class="errormsg">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    

                    <div class="form-group">
                        <div class="col-md-6">

                            <input type="submit" name="submit" value='Submit' class='btn btn-success'>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
</div>

@stop


