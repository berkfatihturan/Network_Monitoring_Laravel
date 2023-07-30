<!DOCTYPE html>
<html>
<head>
    <title>Test E-postası</title>
</head>
<body>
<h1>The device named <?php echo e($details['name']); ?> gives a <?php echo e($details['type']); ?> Warning.</h1>
<p>
    The device named <?php echo e($details['name']); ?> measured
    <?php if($details['type']=="Temperature"): ?>
        Temperature: <?php echo e($details['temp']); ?>°C
    <?php elseif($details['type']=="Humidity"): ?>
        Humidity: <?php echo e($details['humidity']); ?>%
    <?php endif; ?> at <?php echo e($details['updated_at']); ?>.
</p>

<p>Teşekkürler,</p>
<p><?php echo e($settings->company_name); ?></p>
</body>
</html>
<?php /**PATH D:\BFT\Project\Laravel\project_x\resources\views/emails/device_alert_mail.blade.php ENDPATH**/ ?>