<div class="table-data id"><?php echo e($item->id); ?></div>
<div class="table-data"><?php echo e($item->server_name); ?></div>
<div class="table-data"><?php echo e($item->ip); ?></div>
<div class="table-data temp">
    <?php if(optional($item->devices->first())->id): ?>
        <?php echo e($item->devices->first()->temp); ?>°C
    <?php else: ?>
        ---°C
    <?php endif; ?>
</div>
<div class="table-data status"><span class="status-info"
                                     style="display: none"><?php echo e($item->status); ?></span><?php if($item->status): ?>
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
        class="fa-solid fa-trash"></i>
</div>
<div class="table-item" title="Detail" onclick="return !window.open('<?php echo e(route('admin_server_show',['id' => $item->id])); ?>','','width=1000,height=800')"><i class="fa-solid fa-angles-right"></i></div>
<div class="table-item-bottom"><a onclick="toggleCollapseItem(<?php echo e($item->id); ?>)"><i class="fa-solid fa-chevron-down"></i>
        Detail</a></div>
<div class="server_detail_text" id="collapseItem-<?php echo e($item->id); ?>" style="display: <?php echo e($display_status); ?>;">
    <hr/>
    <div class="row" style="margin: 20px;">
        <div class="col-lg-1 col-sm-12" style="font-size: 1.4rem; font-weight: 600">Notes:</div>
        <div class="col-lg-10 col-sm-12" style="padding-top: 8px"><?php echo e($item->detail); ?>

        </div>
    </div>
</div>
<?php /**PATH X:\BFT\Project\Laravel\project_x\resources\views/admin/server/table_item.blade.php ENDPATH**/ ?>