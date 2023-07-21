@extends('layouts.adminbase')

@section('title', 'Admin Panel')

@section('head')


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


        <label for="email">Email:</label><br>
        <input type="text" name="from_email_address" value="{{$settingsData['from_email_address']}}"><br><br>

        <label for="phone">App Password:</label><br>
        <input type="text" name="mail_app_password" value="{{$settingsData['mail_app_password']}}"><br><br>

        <label for="primary_color">Primary color:</label><br>
        <input type="color" name="primary_color" value="{{$settingsData['primary_color']}}"><br><br>

        <label for="secondary_color">Primary color:</label><br>
        <input type="color" name="secondary_color" value="{{$settingsData['secondary_color']}}"><br><br>


        <input type="submit" value="Submit"
               style="background-color: black; color: white !important; padding: 10px; border-radius: 10px; margin-top: 10px;">

    </form>

@endsection

@section('foot')

@endsection
