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
                <td style="padding-block: 0">
                    <span id="temp">{{optional($deviceData)->temp}}</span>°C
                    <span class="mail_settings" style="margin-left: 22px;"> If it is less than <input name="mailTemp" type="number" min="0" style="width: 50px;" value="{{optional($deviceData->mailSettings)->temp}}"> °C and higher than <input name="mailTempMax" type="number" min="0" style="width: 50px;" value="{{optional($deviceData->mailSettings)->temp_max}}"> °C, Send Mail</span>
                </td>
            </tr>

            <tr>
                <th class="">Humidity</th>
                <td style="padding-block: 0"><span id="humidity">{{optional($deviceData)->humidity}}</span>%
                    <span class="mail_settings"> If it is less than <input name="mailHumidity" type="number" min="0" style="width: 50px;" value="{{optional($deviceData->mailSettings)->humidity}}"> % and higher than <input name="mailHumidityMax" type="number" min="0" style="width: 50px;" value="{{optional($deviceData->mailSettings)->humidity_max}}"> %, Send Mail</span>
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

                    <input type="submit" value="SAVE"
                           style="background-color: black; color: white; padding: 3px 10px; border-radius: 10px; margin-left: 10px">

                    @if(\Illuminate\Support\Facades\Session::get('error')!=null)
                        {{\Illuminate\Support\Facades\Session::get('error')}}
                    @endif

                </td>

            </tr>

            <tr style="background: white">
                <th class=""></th>
                <td id="dataset_chart" style="position: relative; right: 100px; max-width: 90vw; overflow: auto">
                    @include('admin.devices.dataset_chart')
                </td>
            </tr>

            <tr>
                <th class="">Log</th>
                <td id="log_table">
                    @include('admin.devices.log_table')
                </td>
            </tr>
        </form>
    </table>

@endsection

@section('foot')
    <script>

        var reloadTime = 30000 // Reload every 30 seconds

        const divElements = [

            {
                selector: '#temp', interval: reloadTime
            },
            {
                selector: '#humidity', interval: reloadTime
            },
            {
                selector: '#dataset_chart', interval: reloadTime
            },
            {
                selector: '#log_table', interval: reloadTime
            }
        ];

        function reloadDiv(element) {

            var device_id = {{$deviceData->id}};
            var data_name = $(element.selector).attr('id');
            var url = "{{ route('admin_devices_reloadShowPage', ['data_name' => ':data_name','device_id' => ':device_id']) }}";
            url = url.replace(':device_id', device_id);
            url = url.replace(':data_name', data_name);

            $.ajax({
                url: url,
                type: "GET",
                success: function (response) {
                    $(element.selector).html(response);
                },
                error: function (xhr) {
                    // Handle any error that may occur during the request
                }
            });
        }

        // Function to initiate the reloading of all div elements
        function reloadAllDivs() {
            for (let i = 0; i < divElements.length; i++) {
                reloadDiv(divElements[i]);
            }
        }

        // Call the function to reload all div elements initially
        reloadAllDivs();

        // Set up intervals for each div element
        for (let i = 0; i < divElements.length; i++) {
            setInterval(function (i) {
                return function () {
                    reloadDiv(divElements[i]);
                };
            }(i), divElements[i].interval);
        }
    </script>
@endsection
