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

        .mail_settings{
            margin-left: 25px;
            display: inline-block;
            padding: 5px 15px;

            border-inline: 1px solid #ddd;
            color: black;
        }

        @media only screen and (max-width: 992px) {
            .mail_settings{
                margin: 0px;
                display: inline-block;
                padding: 5px 0px;
                border-inline: none;
            }
            td{
                padding-top: 10px !important;
            }

            input[type=submit]{
                margin-top: 10px;
                width: 90%;
            }

            select{
                width: 100%;
            }

            table{
                margin-bottom: 20px;
            }
        }

        <!-- -->

        #my-chart.line {
            height: 200px;
            max-width: 400px;
            margin: 0 auto;
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

        <form action="{{route('admin_devices_store',['id' => $deviceData->id])}}" method="POST"
              enctype="multipart/form-data">
            @csrf

            <tr>
                <th class="">Temperature</th>
                <td class="" style="padding-block: 0">
                    {{optional($deviceData)->temp}}°C
                    <span class="mail_settings"> Set Mail Notification: (Min) <input name="mailTemp" type="number" min="0" style="width: 50px;" value="{{optional($deviceData->mailSettings)->temp}}"> (Max) <input name="mailTempMax" type="number" min="0" style="width: 50px;" value="{{optional($deviceData->mailSettings)->temp}}"></span>
                </td>
            </tr>

            <tr>
                <th class="">Humıdıty</th>
                <td class="" style="padding-block: 0">{{optional($deviceData)->humidity}} %
                    <span class="mail_settings"> Set Mail Notification: <input name="mailHumidity" type="number" min="0" style="width: 50px;" value="{{optional($deviceData->mailSettings)->humidity}}"></span>
                </td>
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

                <th>Add a Server</th>
                <td>
                    <select name="server_id">
                        <option selected value="*">-------------</option>
                        @foreach($serverData as $item)
                            @if(!optional($item->devices->first())->id)
                                <option value="{{ $item->id }}">{{ $item->ip }}</option>
                            @endif
                        @endforeach
                    </select>

                    <input type="submit" value="ADD"
                           style="background-color: black; color: white; padding: 3px 10px; border-radius: 10px; margin-left: 10px">

                    @if(\Illuminate\Support\Facades\Session::get('error')!=null)
                        {{\Illuminate\Support\Facades\Session::get('error')}}
                    @endif

                </td>

            </tr>

            <tr>
                <th class="">Log</th>
                <td >
                    <ul>
                        @foreach($logData as $item)
                            <li>{{$item->operation}}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>

            <tr>
                <th class=""></th>
                <td style="position: relative; right: 100px; max-width: 90vw; overflow: auto">
                    @include('admin.devices.dataset_chart')
                </td>
            </tr>
        </form>
    </table>

@endsection

@section('foot')
    <script>


    </script>
@endsection
