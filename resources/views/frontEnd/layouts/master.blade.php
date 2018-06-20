<!DOCTYPE html>
<html lang="en" data-textdirection="LTR" class="loading">
    <head>
        <title>@yield('title') | ময়নামতি নিউজ</title>
        @include('frontEnd.include.headerCss')
        @yield('css')
    </head>
    {{-- <body expr:class='&quot;loading&quot; + data:blog.mobileClass' oncontextmenu='return false;' onkeydown='return false;' onmousedown='return false;' style='-moz-user-select: none;'> --}}
    <body>
        @include('frontEnd.include.top_header')
        @include('frontEnd.include.menu')
        @yield('breaking_news')
        
        @yield('content')
                    
                   
        
        @include('frontEnd.include.footer')
        @include('frontEnd.include.footerJs')
        @yield('js')
    </body>
</html>
