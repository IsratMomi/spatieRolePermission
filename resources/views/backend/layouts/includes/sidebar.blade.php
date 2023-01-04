<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="index.html"><img src="{{ asset('backend/assets/images/icon/logo.png') }}" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="{{ Route::is('admin.dashboard') ? 'active':'' }}">
                        <a href="{{ route('admin.dashboard') }}" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>

                    </li>
                    <li class="{{  Route::is('roles.create')|| Route::is('roles.index') || Route::is('roles.edit') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Roles & Permissions
                            </span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('roles.create') }}">Role Create</a></li>
                            <li><a href="{{ route('roles.index') }}">Roles</a></li>
                        </ul>
                    </li>


                    <li class="{{  Route::is('users.create')|| Route::is('users.index') || Route::is('users.edit') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>User
                            </span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('users.create') }}">User Create</a></li>
                            <li><a href="{{ route('users.index') }}">Users</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
