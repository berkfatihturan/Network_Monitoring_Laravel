
    <td class="item_checkbox" >{{$item->id}}</td>
    <td class="item_name">{{$item->name}}</td>
    <td class="item_email">{{$item->temp}}°C</td>
    <td class="item_email">{{$item->humidity}} %</td>
    <td class="item_settings" title="Settings"
        onclick="return !window.open('{{route('admin_devices_detail',['id' => $item->id])}}','','width=1000,height=800')"><i class="fa-solid fa-gear"></i>
    </td>

