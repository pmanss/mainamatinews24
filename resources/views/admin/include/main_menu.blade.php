<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
    <!-- main menu header-->
    <!-- / main menu header-->
    <!-- main menu content-->
    <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <li class="{{ Request::path() == 'Admin/reporter' ? 'active' : '' }}"><a href="{{url('Admin/reporter')}}"><i class="icon-user-plus"></i><span class="menu-title">New Reporter</span></a>
            </li>
            <li class=" nav-item">
                <a href="#"><i class="icon-cart"></i>
                    <span class="menu-title">Pages Info</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ Request::path() == 'Admin/category' ? 'active' : '' }}"><a href="{{url('Admin/category')}}" class="menu-item">Category Page</a></li>
                    <li class="{{ Request::path() == 'Admin/sub_category' ? 'active' : '' }}"><a href="{{url('Admin/sub_category')}}" class="menu-item">Sub Category Page</a></li>
                </ul>
            </li>
            <li class=" nav-item">
                <a href="#"><i class="icon-cart"></i>
                    <span class="menu-title">Country</span>
                </a>
                <ul class="menu-content">
                    <!--<li class="{{ Request::path() == 'country' ? 'active' : '' }}"><a href="{{url('/country')}}" class="menu-item">Country</a></li>-->
                    <li class="{{ Request::path() == 'Admin/divisions' ? 'active' : '' }}"><a href="{{url('Admin/divisions')}}" class="menu-item">Divisions</a></li>
                    <li class="{{ Request::path() == 'Admin/district' ? 'active' : '' }}"><a href="{{url('Admin/district')}}" class="menu-item">District</a></li>
                    
                </ul>
            </li>
            <li class=" nav-item">
                <a href="#"><i class="icon-cart"></i>
                    <span class="menu-title">Compose News</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ Request::path() == 'Admin/news_article' ? 'active' : '' }}"><a href="{{url('Admin/news_article')}}" class="menu-item">Compose News</a></li>
                    <li class="{{ Request::path() == 'Admin/news/article/list' ? 'active' : '' }}"><a href="{{url('Admin/news/article/list')}}" class="menu-item">Compose News List</a></li>
                </ul>
            </li>
            
            <li class="{{ Request::path() == 'Admin/breakingnews' ? 'active' : '' }}"><a href="{{url('/Admin/breakingnews')}}"><i class="icon-user-plus"></i><span class="menu-title">Breaking News</span></a></li>
            <!--<li class="{{ Request::path() == 'newuser' ? 'active' : '' }}"><a href="{{url('/newuser')}}"><i class="icon-user-plus"></i><span class="menu-title">New user</span></a></li>-->
            <li class="{{ Request::path() == 'Admin/advertisement' ? 'active' : '' }}"><a href="{{url('/Admin/advertisement')}}"><i class="icon-user-plus"></i><span class="menu-title">Advertisement</span></a></li>
        </ul>
    </div>
    <!-- /main menu content-->
    <!-- main menu footer-->
    <div class="main-menu-footer footer-close">
        <div class="header text-xs-center"><a href="#" class="col-xs-12 footer-toggle"><i class="icon-ios-arrow-up"></i></a></div>
        <div class="content">
            <div class="actions">
                <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Settings"><span aria-hidden="true" class="icon-cog3"></span></a>
                <a href="{{url('Admin/unlock')}}" data-placement="top" data-toggle="tooltip" data-original-title="Lock"><span aria-hidden="true" class="icon-lock4"></span></a>

                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-placement="top" data-toggle="tooltip" data-original-title="Logout">
                    <span aria-hidden="true" class="icon-power3"></span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <!-- main menu footer-->
</div>