<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.interface')
<body class="antialiased">

<div class="wrapper">
    <noscript>
        <div class="global-site-notice noscript">
            <div class="notice-inner">
                <p>
                    <strong>JavaScript seems to be disabled in your browser.</strong><br/>
                    Bạn phải bật JavaScript để trang web có thể hoạt động hết tính năng. </p>
            </div>
        </div>
    </noscript>
    <div class="page">
        @include('layouts.header')
        <div id="all">
            <div id="content">
                @yield('content')
            </div>
        </div>


        {{--        <div style="clear: both">&nbsp;</div>--}}
       @include('layouts.footer')


    </div>
</div>
</body>
</html>
