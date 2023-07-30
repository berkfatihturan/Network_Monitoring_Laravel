<!DOCTYPE html>
<html>
<head>
    <title>Test E-postası</title>
</head>
<body>
    <h1>Server with {{ $details['ip'] }} {{$details['type']}} WAS OUT OF SERVICE.</h1>
    <p>{{ $details['ip'] }} HAS BEEN OUT OF SERVICE SINCE {{ $details['updated_at']}} (utc) </p>

    <p>Teşekkürler,</p>
    <p>{{ $settings->company_name }}</p>
</body>
</html>
