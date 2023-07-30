@extends('layouts.adminbase')

@section('title', 'Admin Panel')

@section('head')
    <style>
        #sidebar {
            display: none !important;
        }

        #user-info {
            display: none;
        }

        main {
            margin-left: 3% !important;
            width: 95% !important;
        }

        #device {
            border-block: 1px solid #ddd;
            width: 95vw;
        }

        #device th, #device td {
            border-bottom: 1px solid #ddd;
            padding: 10px;
        }

        #device tr:nth-child(odd) {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246/var(--tw-bg-opacity));

        }


        #device th {
            padding-left: 20px !important;
        }


        #server_relation_list {
            list-style: none;
            padding: 0 !important;
        }

        #server_relation_list li {
            display: inline-block;
            font-size: 0.9rem;
            padding: 5px 10px;
            margin: 10px;
            width: fit-content;
            background: var(--sidebar-background_color);
            color: var(--sidebar-text_color);
            border-radius: 9px;
        }

        #server_relation_list li i {
            padding-left: 5px;
            font-size: 1rem;
            position: relative;
            top: 1px;
        }

        #server_relation_list li i:hover {
            color: red;
        }

        @media only screen and (max-width: 992px) {

        }


    </style>

@endsection

@section('content')
    <div class="section_header">
        <h1 id="admin_section_title">{{optional($deviceData)->name}}</h1>
    </div>

    <table id="device" style="">
        <tr>
            <th class="item_checkbox">Id</th>
            <td class="item_checkbox">{{optional($deviceData)->id}}</td>
        </tr>

        <tr>
            <th class="item_name">Name</th>
            <td class="item_name">{{optional($deviceData)->name}}</td>
        </tr>

        <tr>
            <th class="item_email">Temperature</th>
            <td class="item_email">{{optional($deviceData)->temp}}°C</td>
        </tr>

        <tr>
            <th class="">Humıdıty</th>
            <td class="">{{optional($deviceData)->humidity}} %</td>
        </tr>

        <tr>
            <th class="">Servers</th>
            <td class="">
                <ul id="server_relation_list">
                    @if(optional($deviceData)->servers)
                        @foreach(optional($deviceData)->servers as $item)
                            <li>{{$item->ip}}<i class="fa-regular fa-circle-xmark"
                                                onclick="location.href='{{route('admin_devices_destroy',['did'=>$deviceData->id,'sid' => $item->id])}}';"></i>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </td>


        </tr>

        <tr>
            <form action="{{route('admin_devices_store',['id' => $deviceData->id])}}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <th>Add a Server</th>
                <td>
                    <select name="server_id">
                        @foreach($serverData as $item)
                            <option value="{{ $item->id }}">{{ $item->ip }}</option>
                        @endforeach
                    </select>

                    <input type="submit" value="ADD"
                           style="background-color: black; color: white; padding: 3px 10px; border-radius: 10px; margin-left: 10px">

                    @if(\Illuminate\Support\Facades\Session::get('error')!=null)
                        {{\Illuminate\Support\Facades\Session::get('error')}}
                    @endif

                </td>
            </form>
        </tr>
    </table>

@endsection

@section('foot')
    <script>


    </script>
@endsection
