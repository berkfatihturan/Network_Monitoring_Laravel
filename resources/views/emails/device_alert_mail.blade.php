<!DOCTYPE html>
<html>
<head>
    <title>Test E-postası</title>
</head>
<body>
<h1>The device named {{ $details['name'] }} gives a {{ $details['type'] }} Warning.</h1>
<p>
    The device named {{ $details['name'] }} measured
    @if($details['type']=="Temperature")
        Temperature: {{ $details['temp'] }}°C
    @elseif($details['type']=="Humidity")
        Humidity: {{ $details['humidity'] }}%
    @endif at {{$details['updated_at']}}.
</p>

<p>{{ $settings->company_name }}</p>
</body>
</html>
