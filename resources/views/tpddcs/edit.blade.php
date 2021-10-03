<!-- Extends template page -->
@extends('layouts.master')

<!-- Specify content -->
@section('content')

<div class="main-container col1-layout">
    <div class="main">
        <div class="col-main">
            <div class="title">
                <h3>Edit DDC</h3>
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

                    <a class='btn btn-info float-right' href="{{route('tpddcs')}}">List</a>

                </div>

                <form action="{{route('tpddcs.update',[$tpddc->id])}}" method="post" >
                    {{csrf_field()}}

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ddc_name">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="ddc_name" class="form-control col-md-12 col-xs-12" name="ddc_name" placeholder="Enter DDC name" required="required" type="text" value="{{old('ddc_name',$tpddc->ddc_name)}}">

                                @if ($errors->has('ddc_name'))
                                <span class="errormsg">{{ $errors->first('ddc_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ddc">DDC</label>
                                <input type="number" name="ddc" step="0.0000001" value="{{old('ddc',$tpddc->ddc)}}">
                                @if ($errors->has('ddc'))
                                <span class="errormsg">{{ $errors->first('ddc') }}</span>
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


