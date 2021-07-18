<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    @if(Route::has('admin.dashboard'))
    <a href="{{route('admin.dashboard')}}" class="navbar-brand sidebar-gone-hide"><img src="{{ asset('admin/assets/img/logo.gif')}}" alt="nxtontv_logo" style="max-height: 70px;"/></a>
    @endif
    <div class="navbar-nav">
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
    </div>
    <div class="nav-collapse">
        <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">

        </a>
    </div>
    <form class="form-inline ml-auto">
        <ul class="navbar-nav">
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"></a></li>
        </ul>
    </form>

    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                @if(!empty(Auth::user()->profile_image))
                    <img alt="image" src="<?php echo App\Helpers\Helper::displayProfilePath().Auth::user()->profile_image; ?>" width="35" height="35" class="rounded-circle mr-1">
                @else
                    <img alt="image" src="{{ asset('admin/assets/img/avatar/avatar-1.png')}}" width="35" height="35" class="rounded-circle mr-1">
                @endif
                <div class="d-sm-none d-lg-inline-block">Hi, {{ucfirst(Auth::user()->name)}}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in {{ Carbon\Carbon::parse(Auth::user()->last_logintime_at)->diffForHumans()}} </div>
                <!-- <a href="features-profile.html" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a> -->
                <div class="dropdown-divider"></div>
                <a href="{{ route('admin.logout')}} " class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>

    </ul>
</nav>
<nav class="navbar navbar-secondary navbar-expand-lg">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            @if(Auth::user()->role_id==config('const.Admin') )
                <li class="nav-item dropdown {{ Route::is('admin.user_master.index') || Route::is('admin.company_master.index') ||  Route::is('admin.languages_master.index') || Route::is('admin.channel_genre_master.index') || Route::is('admin.program_genre_master.index') || Route::is('admin.program_sub_genre_master.index') || Route::is('admin.channel_master.index') || Route::is('admin.contact_master.index') ? 'active' : '' }}">
                    <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i
                            class="far fa-clone"></i><span>Masters</span></a>
                    <ul class="dropdown-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.company_master.index') }}" class="nav-link">Company Master</a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('admin.channel_genre_master.index') }} " class="nav-link">Genre Master</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.program_genre_master.index') }}" class="nav-link">Program Genre Master</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.program_sub_genre_master.index') }}" class="nav-link">Program Sub-Genre Master</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.languages_master.index') }}" class="nav-link">Language Master</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.channel_master.index') }}" class="nav-link">Channel Master</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.program_master_add.index') }}" class="nav-link">Program Master</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.other_info_master_add.index')}}" class="nav-link">Other Info Master</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.operator_master.index') }}" class="nav-link">Operator Master</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user_master.index') }}" class="nav-link">User Master</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.contact_master.index') }}" class="nav-link">Contact Master</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="report.html" class="nav-link"><i class="fas fa-fire"></i><span>Report</span></a>
                </li>
                <li class="nav-item">
                    <a href="crm.html" class="nav-link"><i class="fas fa-fire"></i><span>CRM</span></a>
                </li>
            @endif

            <li class="nav-item dropdown {{ Route::is('admin.program_master.index') || Route::is('admin.program_center.index') ||  Route::is('admin.highlights.index') || Route::is('admin.dummy_schedule.index') || Route::is('admin.channel_guide.index') || Route::is('admin.ott.index') || Route::is('admin.movie_shows.index')  ? 'active' : '' }}">
                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i
                        class="far fa-user"></i><span>Program</span></a>
                <ul class="dropdown-menu">
                    {{-- <li class="nav-item">
                        <a href="{{ route('admin.program_master.index') }}" class="nav-link">Program Master</a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="{{ route('admin.movie_shows.index') }}" class="nav-link">Metadata Database</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.program_center.index') }}" class="nav-link">Program Center</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.highlights.index') }}" class="nav-link">Highlights</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.dummy_schedule.index') }}" class="nav-link">Dummy Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.channel_guide.index') }}" class="nav-link">LCN guide</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.ott.index') }}" class="nav-link">OTT</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Route::is('admin.program_master.index') ? 'active' : '' }}">
                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-building"></i><span>Upload Schedule</span></a>
                <ul class="dropdown-menu">
                    <li class="nav-item">
                        <a href="{{ route('admin.upload_menu.index') }}" class="nav-link">News</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Sports</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Movie</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Entertainment</a>
                    </li>
                </ul>
            </li>
            {{-- <li class="nav-item {{ Route::is('admin.upload_menu.index') ? 'active' : '' }}">
                <a href="{{ route('admin.upload_menu.index') }}" class="nav-link"><i class="far fa-building"></i><span>Upload</span></a>
            </li> --}}
            <li class="nav-item {{ Route::is('admin.view_menu.index') ? 'active' : '' }}">
                <a href="{{ route('admin.view_menu.index') }}" class="nav-link"><i class="fas fa-tv"></i><span>View Schedule</span></a>
            </li>
{{--            <li class="nav-item dropdown">--}}
{{--                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i--}}
{{--                        class="far fa-file-alt"></i><span>Discrepancy</span></a>--}}
{{--                <ul class="dropdown-menu">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="error.html" class="nav-link">Error Report</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="import_export.html" class="nav-link">Import/Export</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
            <li class="nav-item dropdown">
                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i
                        class="fa fa-film"></i><span>Images</span></a>
                <ul class="dropdown-menu">
                    <li class="nav-item">
                        <a href="channel_logo1.html" class="nav-link">Channel Logo1</a>
                    </li>
                    <li class="nav-item">
                        <a href="channel_logo2.html" class="nav-link">Channel Logo2</a>
                    </li>
                    <li class="nav-item">
                        <a href="channel_logo3.html" class="nav-link">Channel Logo3</a>
                    </li>
                    <li class="nav-item">
                        <a href="program_images.html" class="nav-link">Program Images</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
