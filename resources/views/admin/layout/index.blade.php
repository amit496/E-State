<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" class="light" data-header-styles="light"
    data-menu-styles="dark">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A Tailwind CSS PHP admin template is a pre-designed web page for an admin dashboard. Optimizing it for SEO includes using meta descriptions and ensuring it's responsive and fast-loading">
    <meta name="keywords" content="admin, php, php admin panel template, admin dashboard template, tailwind, tailwind dashboard template, phpmyadmin, admin template, php admin dashboard, admin dashboard php, php admin template, php admin dashboard template, admin panel design in php, admin panel php template, php admin dashboard">
    <title> Synto - PHP Tailwind Admin Template </title>
    @include('admin.layout.allcss')
    @yield('css')
</head>

<body class="">

    @include('admin.layout.switcher')

    <div class="page">

        @include('admin.layout.left-sidebar')

        @include('admin.layout.header')

        <div class="content">
            @yield('content')
        </div>

        @include('admin.layout.search')

        @include('admin.layout.footer')

    </div>

    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill text-xl"></i></span>
    </div>

    <div id="responsive-overlay"> </div>

    @include('admin.layout.alljs')

    @yield('script')

</body>

</html>
