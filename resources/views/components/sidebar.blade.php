
<div class="app align-content-stretch d-flex flex-wrap">
    <div class="app-sidebar">
        <div class="logo">
            <a href="{{route('home')}}" class="logo-icon" style="background: url({{asset('images/avatars/avatar2.gif')}}) no-repeat; background-position: center center;background-size: 42px;">
            <span class="logo-text">WTZ</span></a>
            <div class="sidebar-user-switcher user-activity-online">
                <a href="/">
                    <img src="{{asset('public/images/avatars/avatar2.png')}}">
                    <span class="activity-indicator"></span>
                    <span class="user-info-text">{{ Auth::user()->username}}<br></span>
                </a>
            </div>
        </div>
        <div class="app-menu">
            <ul class="accordion-menu">
                <li class="sidebar-title">
                    Apps
                </li>
                <li class="{{request()->is('home') ? 'active-page' : ''}}">
                    <a href="{{route('home')}}" class=""><i class="material-icons-two-tone">dashboard</i>{{__('system.home')}}</a>
                </li>
                
                <!--Do not delete this menu line -->
                
                <!--Do Customize where option menu for Admin and Normal user here-->
                
                <!--Setting menu Only Admin can view the Server menu and All role can view Change password menu tab -->
                
                <li class="sidebar-title">
                Other Setting
                </li>                
                
                <li class="{{request()->is('settings') ? 'active-page' : ''}}">
                    <a href="{{route('settings')}}"><i class="material-icons-two-tone">settings</i>{{__('system.setting')}}</a>
                </li>
                @if(Auth::user()->role_id==1)
                    <li class="{{request()->is('user') ? 'active-page' : ''}}">
                        <a href="{{ route('user.index') }}"><i class="material-icons-two-tone">settings</i>{{ 'Users' }}</a>
                    </li>
                    <li class="{{request()->is('role') ? 'active-page' : ''}}">
                        <a href="{{ route('role.index') }}"><i class="material-icons-two-tone">settings</i>{{ 'Roles' }}</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="app-container">
        <div class="search">
            <form>
                <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
            </form>
            <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
        </div>
        <div class="app-header">
            <nav class="navbar navbar-light navbar-expand-lg">
                <div class="container-fluid">
                    <div class="navbar-nav" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link hide-sidebar-toggle-button" href="#"><i class="material-icons">first_page</i></a>
                            </li>

                            <li class="nav-item dropdown hidden-on-mobile">
                                <a class="nav-link dropdown-toggle" href="#" id="exploreDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="material-icons-outlined">explore</i>
                                </a>

                            </li>
                        </ul>

                    </div>
                    <div class="d-flex">
                        <ul class="navbar-nav">
                          

                            <li class="nav-item hidden-on-mobile">
                                <!--<span class="material-icons">manage_accounts</span>-->
                                <a class="material-icons-round" id="notificationsDropDown" href="#" data-bs-toggle="dropdown">manage_accounts</a>
                                <div class="dropdown-menu dropdown-menu-end notifications-dropdown" aria-labelledby="notificationsDropDown">
                                    <form action="{{route('logout')}}" method="POST">
                                        @csrf
                                        
                                        <center>Welcome Back ~ <span class="user-info-text">{{ Auth::user()->username}}<br></span></center>
                                        
                                        <li class="{{request()->is('settings') ? 'active-page' : ''}}">
                                        <a href="{{route('settings')}}" button type="submit" class="dropdown-header h6 " style="border: 0; background-color :white;">Change password</a>
                                        </li>
                                        
                                        <button type="submit" class="dropdown-header h6 " style="border: 0; background-color :white;">Logout</button>
                                        
                                    </form>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>