<?php $__env->startSection('title', 'Admin Panel'); ?>

<?php $__env->startSection('head'); ?>
    <style>
        #sidebar{
            display: none;
        }

        main{
            margin-left: 3% !important;
            width: 95% !important;
        }
    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="section_header">
        <h1 id="admin_section_title">DEVİCES</h1>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('foot'); ?>
    <script>


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminbase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BFT\Project\Laravel\project_x\resources\views/admin/devices/detail.blade.php ENDPATH**/ ?>