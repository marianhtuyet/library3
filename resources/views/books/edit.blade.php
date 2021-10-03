<!-- Extends template page -->
@extends('layouts.master')

<!-- Specify content -->
@section('content')

<div class="main-container col1-layout">
    <div class="main">
        <div class="col-main">
            <div class="title">
                <h3>Sửa sách</h3>
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

                    <a class='btn btn-info float-right' href="{{route('books')}}">List</a>

                </div>

                <form action="{{route('books.update',[$books->id])}}" enctype="multipart/form-data" method="post" >
                    {{csrf_field()}}
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <img src=" {{ $books->img_src}}" alt=" hình ảnh" width="600" height="500">
                             <input type="file" name="img_src" />
                           
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" class="form-control col-md-12 col-xs-12" name="name" placeholder="Enter language_books name" required="required" type="text" value="{{$books->name}}">

                            @if ($errors->has('name'))
                            <span class="errormsg">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="original">Nguyên tác <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="original" class="form-control col-md-12 col-xs-12" name="original" placeholder="Enter book name"  type="text" value="{{$books->original}}">

                                @if ($errors->has('original'))
                                <span class="errormsg">{{ $errors->first('original')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="temporary_content">Mô tả ngắn <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="temporary_content" class="form-control col-md-12 col-xs-12" name="temporary_content" placeholder="Enter temporary content"  value="{{$books->temporary_content}}" type="text">

                                @if ($errors->has('temporary_content'))
                                <span class="errormsg">{{ $errors->first('temporary_content')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type_book_id">Loại sách <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <select class="form-control " name="type_book_id">
                                @foreach($type_books as $type_book)
                                <option value="{{ $type_book->id }}" <?php echo( $type_book->id == $books->type_book_id ? 'selected': '')?>>{{ $type_book->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="language_id">Ngôn ngữ <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select class="form-control " name="language_id">
                            @foreach($language_books as $language_book)
                            <option value="{{ $language_book->id }}" <?php echo( $language_book->id == $books->language_id ? 'selected': '')?>>{{ $language_book->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ddc_id">DDC <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select class="form-control " name="ddc_id">
                            @foreach($tpddcs as $tpddc)
                            <option value="{{ $tpddc->id }}" <?php echo( $tpddc->id == $books->ddc_id ? 'selected': '')?>>{{ $tpddc->ddc_name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author_id">Tác giả <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <select class="selectpicker" multiple id="select_multi_author" name="author_ids[]" data-live-search="true" style="display: block;" onchange="refresh_list(this)">
                          @foreach ($authors as $author)
                          <option  <?php echo( in_array($author->id, json_decode($books->author_ids))  ? 'selected': '')?> value="{{ $author->id }}">{{ $author->name }}</option>       
                          @endforeach
                      </select>
                      <script type="text/javascript">
                        jQuery(document).ready(function(){
                          jQuery('.selectpicker').selectpicker();

                      }); 
                        function refresh_list(obj){
                             document.getElementsByClassName("bootstrap-select").style.display = "block";
                        }
                    </script>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="chapter">Số chương
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                     <input id="chapter" class="form-control col-md-12 col-xs-12" name="chapter" placeholder="Enter book name"  type="text" value="{{$books->chapter}}"/>
                 </div>
                 </div>
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="summary">Tóm tắt </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input id="summary" class="form-control col-md-12 col-xs-12" name="summary" value="{{$books->summary}}" placeholder="Enter book name"  type="text">
                     </div>
                 </div>
                 <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="series">Series </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                     <input id="series" class="form-control col-md-12 col-xs-12" name="series" value="{{$books->series}}" placeholder="Enter book name"  type="text">
                 </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="publishing_company_id">Nhà xuất bản </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control " name="publishing_company_id">
                            @foreach($publishers as $publisher)
                            <option value="{{ $publisher->id }}" <?php echo( $publisher->id == $books->publishing_company_id ? 'selected': '')?>>{{ $publisher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="republishing">Tái bản số</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="republishing" class="form-control col-md-12 col-xs-12" name="republishing" value="{{$books->republishing}}" placeholder="Tái bản"  type="number">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="year_publishing">Năm xuất bản</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="year_publishing" class="form-control col-md-12 col-xs-12" name="year_publishing" value="{{$books->year_publishing}}" placeholder="Năm xuất bản"  type="number">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="page_number">Số trang</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="page_number" class="form-control col-md-12 col-xs-12" name="page_number" value="{{$books->page_number}}" placeholder="Số trang"  type="number">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="input_date">Ngày nhập</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="input_date" class="form-control col-md-12 col-xs-12" name="input_date" value="{{$books->input_date}}" placeholder="Ngày nhập"  type="date">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cost">Giá</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="cost" class="form-control col-md-12 col-xs-12"  name="cost" value="{{$books->cost}}" placeholder="Giá"  type="number">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status_id">Trạng thái </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control " name="status_id">
                            @foreach($status_books as $status_book)
                            <option value="{{ $status_book->id }}"  <?php echo( $status_book->id == $books->status_id ? 'selected': '')?>>{{ $status_book->name }}</option>
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


