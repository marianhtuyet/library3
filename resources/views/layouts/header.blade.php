
<div>
    <header id="header" class="page-header">
        <div class="page-header-container">
            <div class="header-logo-cart">
                <div class="top-banner container">
                    <a class="banner" href="">
                        <img src="/assets/img/banner.jpg"/>
                    </a>
                </div>
            </div>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                  <li>
                   <a href="" class="nav-link scrollto active">
                    <img src="/assets/img/home.png" alt="Thư viện Đa Minh"/>
                </a>

                <li class="dropdown"><a href="#"><span>Danh mục sách</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                      <li>
                        <a href="{{route('tpddcs.100')}}">100- Triết học-Tâm lý học</a>
                    </li>
                    <li>
                        <a href="{{route('tpddcs.200')}}">200- Tôn giáo</a>
                    </li>
                    <li>
                        <a href="{{route('tpddcs.300')}}">300- Khoa học Xã hội</a>
                    </li>
                    <li>
                        <a href="{{route('tpddcs.400')}}">400- Ngôn ngữ học</a>
                    </li>
                    <li>
                        <a href="{{route('tpddcs.500')}}">500- KHTN-Toán học</a>
                    </li>
                </ul>
            </li>
            <li>
               <!-- <div id="header-search" class="skip-content"> -->
                <div>
                    <form id="search_mini_form" action="http://thuviendaminh.net/index.php/thuvien/search/"
                    method="get">
                    <!--  input-box-->
                    <div class="form-select">
                        <select name="typesearch">
                            <option value="">Tiêu chí tìm kiếm</option>
                            <option value="tacpham">Tên tác phẩm</option>
                            <option value="matacpham">Mã tác phẩm</option>
                            <option value="tacgia">Tác giả</option>
                            <option value="dichgia">Dịch giả</option>
                            <option value="ddc">Số phân loại DDC</option>
                            <option value="nguyentac">Nguyên tác</option>
                            <option value="nhaxb">Nhà Xuất bản</option>
                            <option value="mucluc">Mục lục</option>
                            <option value="sachbo">Sách bộ</option>
                        </select>

                        <input type="email" name="email"  placeholder="Từ khóa cần tìm">

                        <input type="submit" value="Search">

                    </div>

                    <!-- <div id="search_autocomplete" class="search-autocomplete"></div> -->
                    <script type="text/javascript">
                                    //<![CDATA[
                                    var searchForm = new Varien.searchForm('search_mini_form', 'search', '');
                                    searchForm.initAutocomplete('index.php/catalogsearch/ajax/suggest/index.html', 'search_autocomplete');
                                    //]]>
                                </script>
                            </form>

                        </div>
                    </li>

                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    <?php
                    if (Auth::user()){
                        // <a class="nav-link scrollto"  href="/">'.(Auth::user()->name).'</a>
                        echo '<li class="dropdown"><a href="#"><span>'.(Auth::user()->name).'</span> <i class="bi bi-chevron-down"></i></a> 
                        <ul>
                        <li>
                        <a href="">Profile</a>
                        </li>
                        <li>
                        <a href="'.route('logout').'">Log out</a>
                        </li>
                        </ul>
                        </li>';
                    }
                    else{
                        echo '<li><a class="nav-link scrollto" href="'.route('login').'">Login</a></li>';
                        echo '<li><a class="nav-link scrollto" href="'.route('register').'">Sign up</a></li>';
                    }
                    ?>

                    <li class="dropdown"><a href="#"><span>Admin</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                          <li>
                            <a href="{{route('author')}}">Tác giả, dịch giả</a>
                        </li>
                        <li>
                            <a href="{{route('language_books')}}">Ngôn ngữ</a>
                        </li>
                        <li>
                            <a href="{{route('publishers')}}">Nhà xuất bản</a>
                        </li>
                        <li>
                            <a href="{{route('status_books')}}">Trạng thái</a>
                        </li>
                        <li>
                            <a href="{{route('tpddcs')}}">DDC</a>

                        </li>
                        <li>
                            <a href="{{route('type_books')}}">Loại sách</a>
                        </li>
                         
                           <li>
                            <a href="{{route('books')}}">Quản lý sách</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->


        <!-- Search -->
  <!--           <div class="search-categories container">
                <div class="top-search-categories container">
                    <div class="top-categories">
                        <a href="">
                            <img src="../assets/img/home.png" alt="Thư viện Đa Minh"/>
                        </a>
                        <span>Danh mục sách</span>
                        <div class="dropdown-menu  container">
                            <ul id='menu'>
                                <li>
                                    <a href="{{route('tpddcs.100')}}">100- Triết học-Tâm lý học</a>
                                </li>
                                <li>
                                    <a href="{{route('homepage.index')}}">200- Tôn giáo</a>
                                </li>
                                <li>
                                    <a href="{{route('homepage.index')}}">300- Khoa học Xã hội</a>
                                </li>
                                <li>
                                    <a href="{{route('homepage.index')}}">400- Ngôn ngữ học</a>
                                </li>
                                <li>
                                    <a href="{{route('homepage.index')}}">500- KHTN-Toán học</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> -->
              <!--   <div id="header-search" class="skip-content">

                    <form id="search_mini_form" action="http://thuviendaminh.net/index.php/thuvien/search/"
                    method="get">
                    <div class="input-box">
                        <select name="typesearch">
                            <option value="">Tiêu chí tìm kiếm</option>
                            <option value="tacpham">Tên tác phẩm</option>
                            <option value="matacpham">Mã tác phẩm</option>
                            <option value="tacgia">Tác giả</option>
                            <option value="dichgia">Dịch giả</option>
                            <option value="ddc">Số phân loại DDC</option>
                            <option value="nguyentac">Nguyên tác</option>
                            <option value="nhaxb">Nhà Xuất bản</option>
                            <option value="mucluc">Mục lục</option>
                            <option value="sachbo">Sách bộ</option>
                        </select>

                        <input id="search" type="search" name="q" value=""
                        class="input-text required-entry" maxlength="128"
                        placeholder="Từ khóa cần tìm"/>
                        <button type="submit" title="Tìm" class="button search-button">
                            <span><span>Tìm</span></span></button>
                        </div>

                        <div id="search_autocomplete" class="search-autocomplete"></div>
                        <script type="text/javascript">
                                //<![CDATA[
                                var searchForm = new Varien.searchForm('search_mini_form', 'search', '');
                                searchForm.initAutocomplete('index.php/catalogsearch/ajax/suggest/index.html', 'search_autocomplete');
                                //]]>
                            </script>
                        </form>

                    </div>
                   
                </div>

            </div> --> 
            <!-- Account -->
        </div>
    </header>
</div>

