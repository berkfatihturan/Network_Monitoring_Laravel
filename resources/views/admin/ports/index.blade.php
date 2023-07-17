@extends('layouts.adminbase')

@section('title', 'Admin Panel')

@section('head')
    <!--<meta http-equiv="refresh" content="30">-->
    <script>

        function showUpdateForm(ths, id) {

            var dugmeOffset = $(ths).offset();
            $("#updateForm").css({
                top: dugmeOffset.top + "px",
                left: (dugmeOffset.left-130) + "px"
            });

            $("#updateForm").find('input[name="id"]').val(id);

            $("#updateForm").toggle();
            $("body").toggleClass("blur");
        }

        function cancelUpdate() {

            $("#updateForm").find('input[name="id"]').val("");
            $("#updateForm").find('input[name="server_name"]').val("");
            $("#updateForm").find('input[name="ip"]').val("");

            $("#updateForm").toggle();
            $("body").toggleClass("blur");
        }

    </script>
@endsection

@section('content')

    <div class="section_header">
        <h1 id="admin_section_title">PORTS</h1>
        <a class="btn btn-info addButton" onclick="toggleCollapse()"> <i class="fa-solid fa-plus"></i> ADD
        </a>
    </div>

    <div id="collapseForm" style="display: none;">
        <form action="{{route('admin_ports_store')}}" method="POST" enctype="multipart/form-data" class="row">
            @csrf
            <div class="col-3">
                <label for="fname">Ip:</label><br>

                <select  name="server_id">
                    @foreach($serverData as $item)
                    <option value="{{ $item->id }}">{{ $item->ip }}</option>
                    @endforeach
                </select><br>
            </div>
            <div class="col-3">
                <label for="fname">Port Name:</label><br>
                <input type="text" name="port_name"><br>
            </div>
            <div class="col-3">
                <label for="lname">Port:</label><br>
                <input type="text" name="port"><br><br>
            </div>
            <div class="col-1">
                <input type="submit" value="Submit"
                       style="background-color: black; color: white; padding: 10px; border-radius: 10px; margin-top: 10px;">
            </div>
        </form>
    </div>


    <div class="table">
        <div class="table-header">
            <div class="header__item"><a id="name" class="filter__link" href="#">Id</a></div>
            <div class="header__item"><a id="name" class="filter__link" href="#">Server Ip</a></div>
            <div class="header__item"><a id="name" class="filter__link" href="#">Port Name</a></div>
            <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">PORT</a></div>
            <div class="header__item"><a id="draws" class="filter__link filter__link--number" href="#">Status</a>
            </div>
            <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">Update Date</a>
            </div>
            <div class="header__space" style="width: 120px"></div>
        </div>
        <div class="table-content">
            @foreach($portData as $item)
                <div class="table-row" id="{{$item->id}}">
                    @include('admin.ports.table_item')
                </div>
            @endforeach
        </div>
    </div>

    <div id="updateForm">@include('admin.ports.update')</div>

@endsection

@section('foot')
    <script>

        var reloadTime = 5000

        const divElements = [
                @foreach($portData as $item)
            {
                selector: '#{{$item->id}}', interval: reloadTime
            }, // Reload every 30 seconds
            @endforeach
        ];

        function reloadDiv(element) {

            var id = $(element.selector).attr('id');
            var is_open = $(element.selector).find(".port_detail_text").css("display");
            var url = "{{ route('admin_ports_reloadPage', ['id_item' => ':id','is_open' => ':is_open']) }}";
            url = url.replace(':id', id);
            url = url.replace(':is_open', is_open);

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
