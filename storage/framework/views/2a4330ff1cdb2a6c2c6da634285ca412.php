<table class="charts-css line multiple" id="my-chart">

    <tbody>

    <?php $backward = 0 ?>
    <?php $__currentLoopData = $logData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td style="--start:<?php echo e(optional($backward)->temp/100); ?>; --size:<?php echo e(intval(optional($item)->temp)/100); ?> "><span
                    class="data">  </span></td>
            <?php $backward = $item ?>
        </tr>

        <tr>
            <td style="--start:<?php echo e(optional($backward)->humidity/100); ?>; --size:<?php echo e(intval(optional($item)->humidity)/100); ?> "><span
                    class="data">  </span></td>
            <?php $backward = $item ?>
        </tr>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>

</table>
<?php /**PATH X:\BFT\Project\Laravel\project_x\resources\views/admin/devices/dataset_chart.blade.php ENDPATH**/ ?>