@extends('layouts.adminbase')

@section('title', 'Admin Panel')

@section('head')
    <style>
        *{
            color: black !important;
        }
    </style>
@endsection

@section('content')
<div id="your-div"></div>






@endsection

@section('foot')
    <script>

        function reloadDiv() {
            $.ajax({
                url: "{{ route('admin_index' ) }}",
                type: "GET",
                success: function(response) {
                    $('#your-div').html(response);
                },
                error: function(xhr) {
                    // Handle any error that may occur during the request
                }
            });
        }

        // Call the function to reload the div initially
        /*reloadDiv();*/

        // Set up the interval to reload the div every 30 seconds
        /*setInterval(reloadDiv, 30000); // 30 seconds = 30000 milliseconds*/
    </script>
@endsection
