@extends('layouts.adminbase')

@section('title', 'Admin Panel')

@section('head')
    <style>

        :root {
            --primary: #001C30;
            --secondory: #176B87;
            --light: #64CCC5;
            --white: {{$settingsData['primary_color']}}!important;
        }


    </style>
@endsection

@section('content')

    <div class="section_header">
        <h1 id="admin_section_title">SETTINGS</h1>

    </div>


    <form action="{{route('admin_settings_update')}}" method="POST" enctype="multipart/form-data" class="row">
        @csrf

        <label for="company_name">Company Name:</label><br>
        <input type="text" name="company_name" value="{{$settingsData['company_name']}}"><br>

        <label for="logo">Logo:</label><br>
        <input type="file" name="logo"><br><br>

        <label for="description">Description:</label><br>
        <input type="text" name="description" value="{{$settingsData['description']}}"><br><br>

        <label for="permission_to_mail"> Permission to Mail:</label>
        <input type="checkbox" name="permission_to_mail" value="1" @if($settingsData['permission_to_mail']) checked @endif>
        <br>

        <label for="address">Address:</label><br>
        <input type="text" name="address" value="{{$settingsData['address']}}"><br><br>

        <label for="phone">Phone:</label><br>
        <input type="text" name="phone" value="{{$settingsData['phone']}}"><br><br>

        <label for="email">Email:</label><br>
        <input type="text" name="email" value="{{$settingsData['email']}}"><br><br>

        <label for="primary_color">Primary color:</label><br>
        <input type="color" name="primary_color" value="{{$settingsData['primary_color']}}"><br><br>

        <label for="secondary_color">Primary color:</label><br>
        <input type="color" name="secondary_color" value="{{$settingsData['secondary_color']}}"><br><br>


        <input type="submit" value="Submit"
               style="background-color: black; color: white !important; padding: 10px; border-radius: 10px; margin-top: 10px;">

    </form>

@endsection

@section('foot')
    <script>

        function reloadDiv() {
            $.ajax({
                url: "{{ route('admin_index' ) }}",
                type: "GET",
                success: function (response) {
                    $('#your-div').html(response);
                },
                error: function (xhr) {
                    // Handle any error that may occur during the request
                }
            });
        }

        // Call the function to reload the div initially
        /*reloadDiv();*/

        // Set up the interval to reload the div every 30 seconds
        /*setInterval(reloadDiv, 30000); // 30 seconds = 30000 milliseconds*/
    </script>
@endsection
