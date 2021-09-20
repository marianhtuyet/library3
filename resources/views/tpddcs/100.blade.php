

@include('layouts.interface')
<body>
@include('layouts.header')
<div class="main-container col1-layout">
    <div class="main">
        <div class="col-main">
            <div class="category-view">
                <div class="title">
                    <span>100- Triết học-Tâm lý học</span>
                </div>
                 <ul class="product-list">
                     @foreach ($books as $book)
                
                     <li>
                        <div class="">
                            <a href="{{route('book.info', $book->id)}}">
                                <img src="http://thuviendaminh.net/skin//frontend/rwd/thuvien/images/demobooks/biamau.png"
                                     title="{$book->name}">

                            </a>
                        </div>
                        <div class="book-infor">
                            <div class="product-name">
                                <a href="{{route('book.info', $book->id)}}" title="{$book->name}">
                                   {{$book->name}}</a>
                            </div>

                            <div> Tác giả: <a href="http://thuviendaminh.net/index.php/thuvien/tacgia/listp/id/15194/"><span class="tacgia"> {{$book->author_name}} </span></a></div>
                        </div>
                    </li>
                    @endforeach
                 </ul>
                <div class="toolbar">

                    <div class="pager pager-no-toolbar">
                        <div class="pages">
                            <strong>Trang:</strong>
                            <ol>
                                <li class="current">1</li>
                                <li><a href="http://thuviendaminh.net/index.php/thuvien/catalog_category/view/id/2/?p=2">2</a></li>
                                <li><a href="http://thuviendaminh.net/index.php/thuvien/catalog_category/view/id/2/?p=3">3</a></li>
                                <li><a href="http://thuviendaminh.net/index.php/thuvien/catalog_category/view/id/2/?p=4">4</a></li>
                                <li><a href="http://thuviendaminh.net/index.php/thuvien/catalog_category/view/id/2/?p=5">5</a></li>
                                <li><a class="last" href="http://thuviendaminh.net/index.php/thuvien/catalog_category/view/id/2/?p=6">6</a></li>
                                <li><a class="next i-next" href="http://thuviendaminh.net/index.php/thuvien/catalog_category/view/id/2/?p=2"
                                       title="Kế tiếp">Kế tiếp </a>
                                </li>
                            </ol>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</table>
</body>
