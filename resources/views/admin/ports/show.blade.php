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
            overflow: auto;
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
            width: 25%;
        }


        #port_list {
            list-style: none;
            padding: 0 !important;
        }

        #port_list li {
            display: inline-block;
            font-size: 0.9rem;
            padding: 5px 10px;
            margin: 10px;
            width: fit-content;
            background: var(--sidebar-background_color);
            color: var(--sidebar-text_color);
            border-radius: 9px;
        }

        #port_list li i {
            padding-left: 5px;
            font-size: 1rem;
            position: relative;
            top: 1px;
        }

        #port_list li i:hover {
            color: red;
        }

        @media only screen and (max-width: 992px) {

        }


    </style>

@endsection

@section('content')
    <div class="section_header">
        <h1 id="admin_section_title">{{optional($portData)->port_name}}</h1>
    </div>

    <table id="device" style="">
        <tr>
            <th class="item_checkbox">Id</th>
            <td class="item_checkbox">{{optional($portData)->id}}</td>
        </tr>

        <tr>
            <th class="item_name">Name</th>
            <td class="item_name">{{optional($portData)->port_name}}</td>
        </tr>

        <tr>
            <th class="">Port</th>
            <td class="">{{optional($portData)->port}}</td>
        </tr>

        <tr>
            <th class="">Server Name</th>
            <td class="">{{optional($portData->server)->server_name}}</td>
        </tr>

        <tr>
            <th class="">Server Ip</th>
            <td class="">{{optional($portData->server)->ip}}</td>
        </tr>


        <tr>
            <th class="">Status</th>
            <td class="">
                <span class="status-info" style="display: none">{{$portData->status}}</span>
                @if($portData->status)
                    <i class="fa-solid fa-square-check" style="color: green; font-size: 2rem; content: 'out'"></i>
                @else
                    <span class="btn btn-danger"
                          style="font-weight: 600; font-size: 0.9rem; padding: 5px">OUT OF SERVER</span>
                @endif
            </td>
        </tr>

        <tr>
            <th class="">Update Date</th>
            <td class="">{{$portData->updated_at}}</td>
        </tr>

        <tr>
            <th class="">Created at</th>
            <td class="">{{$portData->created_at}}</td>
        </tr>

        <tr>
            <th class="">Notes</th>
            <td class="">{{$portData->detail}}</td>
        </tr>

        <tr>
            <th class="">Log</th>
            <td class="" style="width: 100%">
                <ul>
                    @foreach($logData as $item)
                        <li>{{$item->operation}}</li>
                    @endforeach

                </ul>
            </td>
        </tr>


    </table>

@endsection

@section('foot')
    <script>


    </script>
@endsection
