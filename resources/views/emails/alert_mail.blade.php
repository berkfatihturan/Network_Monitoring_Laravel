<!DOCTYPE html>
<html>
<head>
    <title>Test E-postası</title>
</head>
<body>


<img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path( 'assets\admin\img\logo.png '))) }}">


<h1>Server with {{ $details['ip'] }} {{$details['type']}} WAS OUT OF SERVICE.</h1>
<p>85.111.45.200 HAS BEEN OUT OF SERVICE SINCE {{ $details['updated_at']}} (utc) </p>

<p>Teşekkürler,</p>
<p>{{ $settings->company_name }}</p>
</body>
</html>
