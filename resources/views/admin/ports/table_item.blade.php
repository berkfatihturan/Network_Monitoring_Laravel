<div class="table-data id">{{$item->id}}</div>
<div class="table-data">{{optional($item->server)->ip}}</div>
<div class="table-data">{{$item->port_name}}</div>
<div class="table-data">{{$item->port}}</div>
<div class="table-data status">@if($item->status)
        <i class="fa-solid fa-square-check" style="color: green; font-size: 2rem; content: 'out'"></i>
    @else
        <span class="btn btn-danger" style="font-weight: 600; font-size: 0.9rem; padding: 5px">OUT OF SERVER</span>
    @endif
</div>
<div class="table-data">{{$item->updated_at}} <span style="font-size: small; color: black; opacity: .6">(utc)</span>
</div>

<div class="table-item" onclick="showUpdateForm(this,{{$item->id}})"><i class="fa-solid fa-wrench"></i></div>
<div class="table-item" title="Delete"
     onclick="location.href='{{ route('admin_ports_destroy',['id' => $item->id]) }}';"><i
        class="fa-solid fa-trash"></i></div>
<div class="table-item" title="Ports"><i class="fa-solid fa-angles-right"></i></div>
<div class="table-item-bottom"><a onclick="toggleCollapseItem({{$item->id}})"><i class="fa-solid fa-chevron-down"></i>
        Detail</a></div>
<div class="port_detail_text" id="collapseItem-{{$item->id}}" style="display: {{$display_status}};">
    <hr/>
    d*wüojqfqwofuqwjüofjq9op
</div>
