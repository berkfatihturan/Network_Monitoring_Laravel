@extends('layouts.adminbase')

@section('title', 'Admin Panel')

@section('head')
    <!--<meta http-equiv="refresh" content="30">-->
    <script>

        function showUpdateForm(ths, id) {

            var dugmeOffset = $(ths).offset();
            $("#updateForm").css({
                top: dugmeOffset.top + "px",
                left: (dugmeOffset.left - 130) + "px"
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
        <h1 id="admin_section_title">SERVERS</h1>
        <a class="btn btn-info addButton" onclick="toggleCollapse()"> <i class="fa-solid fa-plus"
                                                                         style="color: white"></i> ADD
        </a>
    </div>

    <div id="collapseForm" style="display: none;">
        <form action="{{route('admin_server_store')}}" method="POST" enctype="multipart/form-data" class="row">
            @csrf
            <div class="col-lg-3 col-sm-12">
                <label for="fname">Server Name:</label><br>
                <input type="text" name="server_name" required><br>

            </div>
            <div class="col-lg-3 col-sm-12">
                <label for="lname">Ip:</label><br>
                <input type="text" name="ip" required><br><br>
            </div>

            <div>
                <p style="margin-bottom: 5px"><label for="detail">Details:</label></p>
                <textarea  name="detail" rows="4" style="width:80vw"></textarea>
            </div>

            <div class="col-lg-2 col-sm-12">
                <input type="submit" value="Submit"
                       style="background-color: black; color: white; padding: 10px; border-radius: 10px; margin-top: 10px;">
            </div>
            </hr>
        </form>

    </div>


    <div class="table">
        <div class="table-header">
            <div class="header__item id"><a id="name" class="filter__link" href="#">Id</a></div>
            <div class="header__item"><a id="name" class="filter__link" href="#">Name</a></div>
            <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">IP</a></div>
            <div class="header__item temp"><a id="wins" class="filter__link filter__link--number" href="#">Temp</a>
            </div>
            <div class="header__item status"><a id="draws" class="filter__link filter__link--number" href="#">Status</a>
            </div>
            <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">Update Date</a>
            </div>
            <div class="header__space" style="width: 180px"></div>
        </div>
        <div class="table-content">
            @foreach($serverData as $item)
                <div class="table-row @if($item->status)  @else out-of-servis @endif" id="{{$item->id}}">
                    @include('admin.server.table_item')
                </div>
            @endforeach
        </div>
    </div>
    <div id="updateForm">@include('admin.server.update')</div>

@endsection

@section('foot')

    <script>

        var reloadTime = 5000

        const divElements = [
                @foreach($serverData as $item)
            {
                selector: '#{{$item->id}}', interval: reloadTime
            }, // Reload every 30 seconds
            @endforeach
        ];

        function reloadDiv(element) {

            var id = $(element.selector).attr('id');
            var is_open = $(element.selector).find(".server_detail_text").css("display");
            var url = "{{ route('admin_server_reloadPage', ['id_item' => ':id','is_open' => ':is_open']) }}";
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
                    setBoxColorOnStatus();
                };
            }(i), divElements[i].interval);
        }

        function setBoxColorOnStatus() {
            $(".table-row .status-info").each(function () {
                if ($(this).text() === "1") {
                    $(this).parent().parent().removeClass("out-of-servis");
                } else {
                    $(this).parent().parent().addClass("out-of-servis");
                }
            });
        }
    </script>
@endsection


