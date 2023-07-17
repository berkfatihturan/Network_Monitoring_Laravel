<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield("title")</title>
    @yield('head')

    <script src="https://kit.fontawesome.com/d9aa960ef9.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets')}}/admin/css/style.css"/>


</head>

<body>
    @include("admin.header")

    @include("admin.sidebar")
    <main>
    @yield('content')
    </main>
    @include("admin.footer")
    @yield('foot')
</body>

