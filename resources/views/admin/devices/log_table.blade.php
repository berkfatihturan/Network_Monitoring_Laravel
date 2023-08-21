<ul>
    @foreach($logData as $item)
        <li>{{$item->operation}}</li>
    @endforeach
</ul>
