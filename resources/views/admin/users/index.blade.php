@extends('layouts.adminbase')

@section('title', 'Admin Panel')

@section('head')
    <style>
        #users {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #users td, #users th {
            border-bottom: 1px solid #ddd;
            padding: 20px;
            padding-left: 40px;
        }


        #users tr:hover {
            background-color: #ddd;
        }

        #users th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        .table-profile-img {
            border-radius: 50%;
            width: 50px;
            margin-right: 10px;
        }
    </style>
@endsection

@section('content')

    <div class="section_header">
        <h1 id="admin_section_title">USERS</h1>
    </div>

    <form action="{{route('admin_users_update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <table id="users">
            <tr>
                <th></th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th></th>

            </tr>
            @foreach($userData as $item)
                <tr>
                    <td><input type="checkbox" name="is_allowed-{{$item->id}}" value="on"
                               @if( optional($item->user_login_permission)->is_allowed) checked
                               @endif
                               @if( \Illuminate\Support\Facades\Auth::id() == $item->id) style="pointer-events: none;"
                             @endif></td>
                    <td><img class="table-profile-img" src="{{asset('assets')}}/admin/img/user.png">{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>@if( optional($item->user_login_permission)->is_allowed)
                            ALLOWED
                        @else
                            NOT ALLOWED
                        @endif</td>
                    <td><a class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" fill="white">
                                <path
                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach

        </table>

        <input type="submit" value="Submit"
               style="background-color: black; color: white !important; padding: 10px 30px; border-radius: 10px;">
    </form>
@endsection

@section('foot')
    <script>


    </script>
@endsection
