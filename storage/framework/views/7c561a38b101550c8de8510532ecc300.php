<ul>
    <?php $__currentLoopData = $logData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($item->operation); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH X:\BFT\Project\Laravel\project_x\resources\views/admin/devices/log_table.blade.php ENDPATH**/ ?>