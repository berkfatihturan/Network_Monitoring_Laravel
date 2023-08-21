<!DOCTYPE html>
<html>
<head>
    <title>Test E-postası</title>
</head>
<body>
    <h1>Server with <?php echo e($details['ip']); ?> <?php echo e($details['type']); ?> WAS OUT OF SERVICE.</h1>
    <p><?php echo e($details['ip']); ?> HAS BEEN OUT OF SERVICE SINCE <?php echo e($details['updated_at']); ?> (utc) </p>

    <p>Teşekkürler,</p>
    <p><?php echo e($settings->company_name); ?></p>
</body>
</html>
<?php /**PATH X:\BFT\Project\Laravel\project_x\resources\views/emails/alert_mail.blade.php ENDPATH**/ ?>