<tr>
    <th class="item_checkbox">Id</th>
    <th class="item_name">NAME</th>
    <th class="item_email">TEMPERATURE</th>
    <th class="item_email">HUMIDITY</th>
    <th class="item_settings"></th>
</tr>
<?php $__currentLoopData = $deviceData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="<?php echo e($item->id); ?>">
        <td class="item_checkbox"><?php echo e($item->id); ?></td>
        <td class="item_name"><?php echo e($item->name); ?></td>
        <td class="item_email"><?php echo e($item->temp); ?>°C</td>
        <td class="item_email"><?php echo e($item->humidity); ?> %</td>
        <td class="item_settings" title="Settings"
            onclick="return !window.open('<?php echo e(route('admin_devices_detail',['id' => $item->id])); ?>','','width=1000,height=800')">
            <i class="fa-solid fa-gear"></i>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH X:\BFT\Project\Laravel\project_x\resources\views/admin/devices/table_item.blade.php ENDPATH**/ ?>