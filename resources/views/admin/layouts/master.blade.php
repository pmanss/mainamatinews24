<!DOCTYPE html>
<html lang="en" data-textdirection="LTR" class="loading">
    <head>
        <title>@yield('title') | Newspaper Admin Panel</title>
        @include('admin.include.headercss')
        @yield('css')
    </head>
    <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

        <!-- navbar-fixed-top-->
        @include('admin.include.top_navbar')
        {{-- @include('admin.include.fullscreen_search') --}}
        <!-- main menu-->
        @include('admin.include.main_menu')
        <!-- / main menu-->
        <div class="app-content content container-fluid">
            <div class="content-wrapper">
                <div class="content-header row">
                    @yield('breadcrumb') 
                </div>
                <div class="content-body">
                     @yield('messageinfo')
                    <!-- Basic form layout section start -->
                    @yield('content')
                    
                    <!-- // Basic form layout section end -->
                </div>
            </div>
        </div>
 
        
        @include('admin.include.footer')
        @include('admin.include.footerJs')
        @yield('js')
    </body>
</html>
