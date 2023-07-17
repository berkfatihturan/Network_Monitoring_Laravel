<!DOCTYPE html>
<html>
<head>
    <title>Test E-postası</title>
</head>
<body>
<h1>Server with {{ $details['ip'] }} IP WAS OUT OF SERVICE.</h1>
<p>85.111.45.200 HAS BEEN OUT OF SERVICE SINCE {{ $details['updated_at']}} (utc) </p>

<p>Teşekkürler,</p>
<p>{{ config('app.name') }}</p>
</body>
</html>
