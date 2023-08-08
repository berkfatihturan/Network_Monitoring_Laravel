<table class="charts-css line multiple" id="my-chart">

    <tbody>

    @php $backward = 0 @endphp
    @foreach($logData as $item)
        <tr>
            <td style="--start:{{optional($backward)->temp/100}}; --size:{{intval(optional($item)->temp)/100}} "><span
                    class="data">  </span></td>
            @php $backward = $item @endphp
        </tr>

    @endforeach
    </tbody>

</table>
