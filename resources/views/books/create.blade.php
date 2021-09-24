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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="temporary_content">Mô tả ngắn <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="temporary_content" class="form-control col-md-12 col-xs-12" name="temporary_content" placeholder="Enter temporary content"  type="text">

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
                                <option value="{{ $type_book->id }}">{{ $type_book->name }}</option>
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
                            <option value="{{ $language_book->id }}">{{ $language_book->name }}</option>
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
                            <option value="{{ $tpddc->id }}">{{ $tpddc->ddc_name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author_id">Tác giả <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select class="form-control " name="author_id">
                            @foreach($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="chapter">Số chương
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                     <input id="chapter" class="form-control col-md-12 col-xs-12" name="chapter" placeholder="Enter book name"  type="text">
                 </div>
                 </div>
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="summary">Tóm tắt </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input id="summary" class="form-control col-md-12 col-xs-12" name="summary" placeholder="Enter book name"  type="text">
                     </div>
                 </div>
                 <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="series">Series </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                     <input id="series" class="form-control col-md-12 col-xs-12" name="series" placeholder="Enter book name"  type="text">
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="republishing">Tái bản số</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="republishing" class="form-control col-md-12 col-xs-12" name="republishing" placeholder="Tái bản"  type="number">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="year_publishing">Năm xuất bản</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="year_publishing" class="form-control col-md-12 col-xs-12" name="year_publishing" placeholder="Năm xuất bản"  type="number">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="page_number">Số trang</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="page_number" class="form-control col-md-12 col-xs-12" name="page_number" placeholder="Số trang"  type="number">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="input_date">Ngày nhập</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="input_date" class="form-control col-md-12 col-xs-12" name="input_date" placeholder="Ngày nhập"  type="date">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cost">Giá</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="cost" class="form-control col-md-12 col-xs-12"  name="cost" placeholder="Giá"  type="number">
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

