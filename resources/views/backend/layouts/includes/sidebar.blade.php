<?php
    $user = Auth::guard('admin')->user();
?>
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
                        @if ($user->can('dashboard.view'))
                            <a href="{{ route('admin.dashboard') }}" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                        @endif

                    </li>
                    @if ($user->can('role.view') || $user->can('role.create') || $user->can('role.edit') || $user->can('role.delete'))
                        <li class="{{  Route::is('roles.create')|| Route::is('roles.index') || Route::is('roles.edit') ? 'active' : '' }}">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Roles & Permissions
                                </span></a>
                            <ul class="collapse">
                                @if ($user->can('role.create'))
                                    <li><a href="{{ route('roles.create') }}">Role Create</a></li>
                                @endif
                                @if ($user->can('role.view'))
                                    <li><a href="{{ route('roles.index') }}">Roles</a></li>
                                @endif
                                    <li><a href="{{ route('permissions.index') }}">Permissions</a></li>

                            </ul>
                        </li>
                    @endif


                    @if ($user->can('admin.create') ||  $user->can('admin.view') || $user->can('admin.edit') || $user->can('admin.delete'))
                        <li class="{{  Route::is('users.create')|| Route::is('users.index') || Route::is('users.edit') ? 'active' : '' }}">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>User
                                </span></a>
                            <ul class="collapse">
                                @if ($user->can('admin.create'))
                                    <li><a href="{{ route('users.create') }}">User Create</a></li>
                                @endif
                                @if ($user->can('admin.view'))
                                    <li><a href="{{ route('users.index') }}">Users</a></li>
                                @endif

                            </ul>
                        </li>
                    @endif

                </ul>
            </nav>
        </div>
    </div>
</div>
