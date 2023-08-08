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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/charts.css/dist/charts.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/admin/css/style.css"/>
    <link rel="stylesheet" href="{{asset('assets')}}/admin/css/style600mx.css"/>

    <style>

        :root {
            --primary: #001C30;
            --secondory: #176B87;
            --light: #64CCC5;
            --secondory-white: {{$settingsData['primary_color']}} !important;
            --text-contrastColor : #00000;
            --sidebar-background_color: {{$settingsData['secondary_color']}} !important;
            --sidebar-text_color: #00000;
        }

    </style>

</head>

<body>
    @include("admin.header")

    @include("admin.sidebar")
    <main>
    @yield('content')
    </main>

    @include("admin.footer")

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
            crossorigin="anonymous"></script>




    @yield('foot')



    <script>
        $(document).ready(function () {
            function getContrastColor(hexColor) {
                // Function to calculate the contrast color (black or white) based on the background color

                // Convert the hex color to RGB format
                const hexToRgb = (hex) =>
                    hex
                        .replace(/^#?([a-f\d])([a-f\d])([a-f\d])$/i, (m, r, g, b) => '#' + r + r + g + g + b + b)
                        .substring(1)
                        .match(/.{2}/g)
                        .map((x) => parseInt(x, 16));

                // Calculate the relative luminance of the color
                const rgb = hexToRgb(hexColor);
                const luminance = (0.2126 * rgb[0] + 0.7152 * rgb[1] + 0.0722 * rgb[2]) / 255;

                // Return black (#000000) for lighter colors, and white (#ffffff) for darker colors
                return luminance > 0.5 ? '#000000' : '#ffffff';
            }
            var headerColor = "{{$settingsData['primary_color']}}";
            var contrastColor = getContrastColor(headerColor);
            // Set the text color to the contrast color
            $("header .dropdown-toggle *").css("color", contrastColor);

            var boxColor = "{{$settingsData['secondary_color']}}";
            var contrastBoxColor = getContrastColor(boxColor);
            $(':root').css('--text-contrastColor', contrastBoxColor);



        });

    </script>
    <script src="{{asset('assets')}}/admin/js/script.js"></script>

</body>

