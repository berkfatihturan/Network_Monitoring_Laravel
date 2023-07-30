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
        <h1 id="admin_section_title">{{optional($serverData)->server_name}}</h1>
    </div>

    <table id="device" style="">
        <tr>
            <th class="item_checkbox">Id</th>
            <td class="item_checkbox">{{optional($serverData)->id}}</td>
        </tr>

        <tr>
            <th class="item_name">Name</th>
            <td class="item_name">{{optional($serverData)->server_name}}</td>
        </tr>

        <tr>
            <th class="item_email">IP</th>
            <td class="item_email">{{optional($serverData)->ip}}</td>
        </tr>

        <tr>
            <th class="item_email">Temperature</th>
            <td class="item_email">
                @if(optional($serverData->devices->first())->id)
                    {{$serverData->devices->first()->temp}}°C
                @else
                    ---°C
                @endif</td>
        </tr>

        <tr>
            <th class="">Humıdıty</th>
            <td class="">{{optional($serverData->devices->first())->humidity}} %</td>
        </tr>

        <tr>
            <th class="item_email">Status</th>
            <td class="item_email">
                <span class="status-info" style="display: none">{{$serverData->status}}</span>
                @if($serverData->status)
                    <i class="fa-solid fa-square-check" style="color: green; font-size: 2rem; content: 'out'"></i>
                @else
                    <span class="btn btn-danger"
                          style="font-weight: 600; font-size: 0.9rem; padding: 5px">OUT OF SERVER</span>
                @endif
            </td>
        </tr>

        <tr>
            <th class="item_email">Update Date</th>
            <td class="item_email">{{$serverData->updated_at}}</td>
        </tr>

        <tr>
            <th class="item_email">Created at</th>
            <td class="item_email">{{$serverData->created_at}}</td>
        </tr>

        <tr>
            <th class="item_email">Ports</th>
            <td class="">
                <ul id="port_list">

                    @foreach($portsData as $item)
                        <li>{{$item->port_name}} | {{$item->port}}</li>
                    @endforeach

                </ul>
            </td>
        </tr>
        <tr>
            <th class="item_email">Notes</th>
            <td class="item_email">{{$serverData->detail}}</td>
        </tr>

        <tr>
            <th class="item_email">Log</th>
            <td class="item_email">
                <ul>
                    @foreach($logData as $item)
                        <li><pre>{{$item->operation}}</pre></li>
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
