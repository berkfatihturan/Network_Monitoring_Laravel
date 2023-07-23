@extends('layouts.adminbase')

@section('title', 'Admin Panel')

@section('head')
    <style>

        .laravel_profile *{
            font-family: Figtree,ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,"Apple Color Emoji","Segoe UI Emoji",Segoe UI Symbol,"Noto Color Emoji" !important;
        }

        .laravel_profile nav{
            display: none;
        }
        .laravel_profile header{
            display: none;
        }

        .laravel_profile main{
            margin:0 10px !important;

        }

        .laravel_profile .bg-gray-100{
            background: transparent;
        }

        .laravel_profile .px-4 .text-sm,
        .laravel_profile .px-4 p,{
            position: relative;
            right: 10px;
        }

        .laravel_profile .py-8{
            width: 78vw;
        }


        /* */

        .sidebar-list__item svg{
            display: inline-block;
        }

        #admin_section_title {
            font-size: 2.5rem;
        }
    </style>
@endsection

@section('content')

    <div class="section_header">
        <h1 id="admin_section_title">PROFILE</h1>
    </div>
    <div class="laravel_profile">
        @include('profile.show')
    </div>

@endsection

@section('foot')
    <script>

    </script>
@endsection
