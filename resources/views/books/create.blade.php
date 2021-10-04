<!-- Extends template page -->
@extends('layouts.master')

<!-- Specify content -->
@section('content')




<div class="main-container col1-layout">
    <div class="main">
        <div class="col-main">
            <div class="title">
                <h3>Thêm Sách mới</h3>
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

                    <form action="{{route('books.store')}}" enctype="multipart/form-data" method="post" id="booksForm">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="book_name">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="book_name" class="form-control col-md-12 col-xs-12" name="book_name" placeholder="Enter book name" required="required" type="text">

                                @if ($errors->has('name'))
                                <span class="errormsg">{{ $errors->first('name')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subtitle">Phụ đề <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="book_name" class="form-control col-md-12 col-xs-12" name="subtitle" placeholder="Nhập phụ đề" required="required" type="text">

                                @if ($errors->has('name'))
                                <span class="errormsg">{{ $errors->first('name')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="original">Nguyên tác <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="original" class="form-control col-md-12 col-xs-12" name="original" placeholder="Enter book name"  type="text">

                                @if ($errors->has('original'))
                                <span class="errormsg">{{ $errors->first('original')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="img_src">Image
                                </label>
                                <input type="file" name="img_src" />
                                @if ($errors->has('img_src'))
                                <span class="errormsg">{{ $errors->first('img_src') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author_id">Tác giả <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="selectpicker" multiple id="select_multi_author" name="author_ids[]" data-live-search="true">
                                  @foreach ($authors as $author)
                                  <option @if(in_array($author->id, $authors->pluck('id')->toArray()))  @endif value="{{ $author->id }}">{{ $author->name }}</option>       
                                  @endforeach
                              </select>
                              <script type="text/javascript">
                               
                              </script>
                          </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="symbol_author">Ký hiệu tác giả <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="symbol_author" class="form-control col-md-12 col-xs-12" name="symbol_author" placeholder="Nhập ký hiệu tác giả"  type="text"/>

                            @if ($errors->has('symbol_author'))
                            <span class="errormsg">{{ $errors->first('symbol_author')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="translator_ids">Dịch giả <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="selectpicker" multiple id="select_multi_translator" name="translator_ids[]" data-live-search="true">
                              @foreach ($translators as $translator)
                              <option @if(in_array($translator->id, $translators->pluck('id')->toArray()))  @endif value="{{ $translator->id }}">{{ $translator->name }}</option>       
                              @endforeach
                          </select>
                          <script type="text/javascript">
                            jQuery(document).ready(function(){
                                // jQuery('#select_multi_author').selectpicker();
                                  // jQuery('#select_multi_translator').selectpicker();

                              }); 
                            
                          </script>

                      </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="publishing_company_id">Nhà xuất bản </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control " name="publishing_company_id">
                            @foreach($publishers as $publisher)
                            <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="year_publishing">Năm xuất bản</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="year_publishing" class="form-control col-md-12 col-xs-12" name="year_publishing" placeholder="Năm xuất bản"  type="number"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="republishing">Tái bản số</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="republishing" class="form-control col-md-12 col-xs-12" name="republishing" placeholder="Tái bản"  type="number"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="page_number">Số trang</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="page_number" class="form-control col-md-12 col-xs-12" name="page_number" placeholder="Số trang"  type="number"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="temporary_content">Kích thước <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="temporary_content" class="form-control col-md-12 col-xs-12" name="temporary_content" placeholder="Nhập kích thước"  type="text"/>

                        @if ($errors->has('temporary_content'))
                        <span class="errormsg">{{ $errors->first('temporary_content')}}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="series">Tập - Số </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                       <input id="series" class="form-control col-md-12 col-xs-12" name="series" placeholder="Nhập tập - số "  type="text"/>
                   </div>
               </div>
               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ddc_id">DDC <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                   <select class="form-control " name="ddc_id">
                    @foreach($tpddcs as $tpddc)
                    <option value="{{ $tpddc->id }}">{{ $tpddc->ddc_name }}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="theme_id">Chủ đề <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
             <select class="form-control " name="theme_id">
                @foreach($themes as $theme)
                <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                @endforeach
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="summary">Tóm tắt </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
         <input id="summary" class="form-control col-md-12 col-xs-12" name="summary" placeholder="Enter book name"  type="text"/>
     </div>
 </div>
 <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="language_id">Ngôn ngữ <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
     <select class="form-control " name="language_id">
        @foreach($language_books as $language_book)
        <option value="{{ $language_book->id }}">{{ $language_book->name }}</option>
        @endforeach
    </select>

</div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="isbn_issn">ISBN - ISSN</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
       <input id="isbn_issn" class="form-control col-md-12 col-xs-12" name="isbn_issn" placeholder="ISBN" value="632HC000_" type="text" disabled />
   </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="input_date">Ngày nhập</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="input_date" class="form-control col-md-12 col-xs-12" name="input_date" placeholder="Ngày nhập"  type="date"/>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type_book_id">Thể loại<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
     <select class="form-control " name="type_book_id">
        @foreach($type_books as $type_book)
        <option value="{{ $type_book->id }}">{{ $type_book->name }}</option>
        @endforeach
    </select>

</div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cost">Giá</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="cost" class="form-control col-md-12 col-xs-12"  name="cost" placeholder="Giá"  type="number">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="site_id">Kho sách </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="form-control " name="site_id">
            @foreach($sites as $site)
            <option value="{{ $site->id }}">{{ $site->name }}</option>
            @endforeach
        </select>
    </div>
</div>     
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="input_date">Ngày nhập</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="input_date" class="form-control col-md-12 col-xs-12" name="input_date" placeholder="Ngày nhập"  type="date"/>
    </div>
</div>






<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status_id">Trạng thái </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="form-control " name="status_id">
            @foreach($status_books as $status_book)
            <option value="{{ $status_book->id }}">{{ $status_book->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="quantity">Số lượng</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="quantity" class="form-control col-md-12 col-xs-12" name="quantity" placeholder="Số lượng"  type="number"/>
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

