<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   @include('backend.layouts.includes.style')
   @yield('custome_css')


</head>

<body>

    <div class="page-container">

       @include('backend.layouts.includes.sidebar')

        <div class="main-content">

           @include('backend.layouts.includes.header')
           <div class="page-title-area">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="breadcrumbs-area clearfix">
                        <h4 class="page-title pull-left" style="text-decoration: none"><a href="{{ route('admin.dashboard') }}" >Dashboard</a></h4>
                        <ul class="breadcrumbs pull-left">
                            <li><a href="">@yield('page_title')</a></li>
                            <li><span>Dashboard</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 clearfix">
                    <div class="user-profile pull-right">
                        <img class="avatar user-thumb" src="{{ asset('backend/assets/images/author/avatar.png') }}" alt="avatar">
                        <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Kumkum Rai <i class="fa fa-angle-down"></i></h4>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Message</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <a class="dropdown-item" href="#">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

          @yield('content')
        </div>

       @include('backend.layouts.includes.footer')

    </div>
   @include('backend.layouts.includes.ofset')

    @include('backend.layouts.includes.script')
    @yield('custom_js')
</body>

</html>
