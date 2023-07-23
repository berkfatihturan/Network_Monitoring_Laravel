<div class="table-data id"><?php echo e($item->id); ?></div>
<div class="table-data"><?php echo e($item->server->ip); ?></div>
<div class="table-data"><?php echo e($item->port_name); ?></div>
<div class="table-data"><?php echo e($item->port); ?></div>
<div class="table-data status"><?php if($item->status): ?>
        <i class="fa-solid fa-square-check" style="color: green; font-size: 2rem; content: 'out'"></i>
    <?php else: ?>
        <span class="btn btn-danger" style="font-weight: 600; font-size: 0.9rem; padding: 5px">OUT OF SERVER</span>
    <?php endif; ?>
</div>
<div class="table-data"><?php echo e($item->updated_at); ?> <span style="font-size: small; color: black; opacity: .6">(utc)</span>
</div>

<div class="table-item" onclick="showUpdateForm(this,<?php echo e($item->id); ?>)"><i class="fa-solid fa-wrench"></i></div>
<div class="table-item" title="Delete"
     onclick="location.href='<?php echo e(route('admin_server_destroy',['id' => $item->id])); ?>';"><i
        class="fa-solid fa-trash"></i></div>
<div class="table-item" title="Ports"><i class="fa-solid fa-angles-right"></i></div>
<div class="table-item-bottom"><a onclick="toggleCollapseItem(<?php echo e($item->id); ?>)"><i class="fa-solid fa-chevron-down"></i>
        Detail</a></div>
<div class="port_detail_text" id="collapseItem-<?php echo e($item->id); ?>" style="display: <?php echo e($display_status); ?>;">
    <hr/>
    d*wüojqfqwofuqwjüofjq9op
</div>
<?php /**PATH D:\BFT\Project\Laravel\project_x\resources\views/admin/ports/table_item.blade.php ENDPATH**/ ?>