@extends('layouts.adminbase')

@section('title', 'Admin Panel')


@section('content')

    <form action="{{route('admin_store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="fname">Server Name:</label><br>
        <input type="text" name="server_name"><br>

        <label for="lname">Ip:</label><br>
        <input type="text" name="ip"><br><br>

        <input type="submit" value="Submit">
    </form>




    <div class="table">
        <div class="table-header">
            <div class="header__item"><a id="name" class="filter__link" href="#">Id</a></div>
            <div class="header__item"><a id="name" class="filter__link" href="#">Name</a></div>
            <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">IP</a></div>
            <div class="header__item"><a id="draws" class="filter__link filter__link--number" href="#">Status</a></div>
        </div>
        <div class="table-content">
            @foreach($serverData as $item)
                <div class="table-row">
                    <div class="table-data">{{$item->id}}</div>
                    <div class="table-data">{{$item->server_name}}</div>
                    <div class="table-data">{{$item->ip}}</div>
                    <div class="table-data">{{$item->status}}</div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
