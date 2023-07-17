<a onclick="cancelUpdate()"><i class="fa-solid fa-xmark"></i></a>
<p>UPDATE</p>
<hr/>

<form action="{{route('admin_ports_update')}}" method="POST" enctype="multipart/form-data" >
    @csrf
    <input type="hidden" name="id">

    <label for="fname">Ip:</label><br>

    <select  name="server_id">
        @foreach($serverData as $item)
            <option value="{{ $item->id }}">{{ $item->ip }}</option>
        @endforeach
    </select><br>

    <label for="fname">Port Name:</label><br>
    <input type="text" name="port_name"><br>

    <label for="lname">Port:</label><br>
    <input type="text" name="port"><br><br>


    <input type="submit" value="Submit"
           style="background-color: black; color: white; padding: 10px; border-radius: 10px; margin-top: 10px;">

</form>
