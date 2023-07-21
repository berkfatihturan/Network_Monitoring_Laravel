<!DOCTYPE html>
<html>
<head>
    <title>Test E-postası</title>
</head>
<body>
<h1>Server with <?php echo e($details['ip']); ?> IP WAS OUT OF SERVICE.</h1>
<p>85.111.45.200 HAS BEEN OUT OF SERVICE SINCE <?php echo e($details['updated_at']); ?> (utc) </p>

<p>Teşekkürler,</p>
<p><?php echo e(config('app.name')); ?></p>
</body>
</html>
<?php /**PATH D:\BFT\Project\Laravel\project_x\resources\views/emails/alert_mail.blade.php ENDPATH**/ ?>