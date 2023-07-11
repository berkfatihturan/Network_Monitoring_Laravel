<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>@yield("title")</title>
    @yield('head')
    <link href="{{asset('assets')}}/admin/css/style.css" rel="stylesheet" />
</head>

<body>
    @include("admin.header")

    @include("admin.sidebar")

    @yield('content')

    @include("admin.footer")
    @yield('foot')
</body>

