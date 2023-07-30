
    <td class="item_checkbox" ><?php echo e($item->id); ?></td>
    <td class="item_name"><?php echo e($item->name); ?></td>
    <td class="item_email"><?php echo e($item->temp); ?>°C</td>
    <td class="item_email"><?php echo e($item->humidity); ?> %</td>
    <td class="item_settings" title="Settings"
        onclick="return !window.open('<?php echo e(route('admin_devices_detail',['id' => $item->id])); ?>','','width=1000,height=800')"><i class="fa-solid fa-gear"></i>
    </td>

<?php /**PATH D:\BFT\Project\Laravel\project_x\resources\views/admin/devices/table_item.blade.php ENDPATH**/ ?>