<!-- Extends template page -->
@extends('layouts.master')

<!-- Specify content -->
@section('content')
<div class="main-container col1-layout">
    <div class="main">
        <div class="col-main">
            <div class="title">
                <h3>Add test_images</h3>
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

                        <a class='btn btn-info float-right' href="{{route('test_images.upload')}}">List </a>

                    </div>

                    <form action="{{route('test_images.store')}}" enctype="multipart/form-data" method="post" id="test_imagesForm">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="img_alt">IMG alt <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="img_alt" class="form-control col-md-12 col-xs-12" name="img_alt" placeholder="Enter test_images name" required="required" type="text">

                                @if ($errors->has('name'))
                                <span class="errormsg">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="img_src">Is test_images
                                </label>
                                
                                <input type="file" name="img_src" />

                                @if ($errors->has('img_src'))
                                <span class="errormsg">{{ $errors->first('img_src') }}</span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author_id">Is test_images
                                </label>
                                
                                 <select class="form-control " name="author_id">
                                    @foreach($authors as $author)
                                      <option value="{{ $author->id }}">{{ $author->name }}</option>
                                      @endforeach
                                  </select>

                              
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

