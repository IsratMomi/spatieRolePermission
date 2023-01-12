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



        <div class="main-content">

            @yield('content')

        </div>






    </div>


    @include('backend.layouts.includes.script')
    @yield('custom_js')
</body>

</html>
