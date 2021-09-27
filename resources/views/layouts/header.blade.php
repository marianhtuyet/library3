
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
        <form  class="form-inline my-2 my-lg-0">
             <select id="select_search_bar" name="typesearch" class="form-control form-control-md my-2" style="
    margin-right: 10px;">
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

      <input class="form-control mr-sm-2" style="width: 500px;" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
    </form>
           <!-- 
            <script type="text/javascript">
                                    //<![CDATA[
                                    var searchForm = new Varien.searchForm('search_mini_form', 'search', '');
                                    searchForm.initAutocomplete('index.php/catalogsearch/ajax/suggest/index.html', 'search_autocomplete');
                                    //]]>
                                </script>
                            </form>
 -->
                        <i class="bi bi-list mobile-nav-toggle"></i>
                    </nav><!-- .navbar -->
        </div>
    </header>
</div>

