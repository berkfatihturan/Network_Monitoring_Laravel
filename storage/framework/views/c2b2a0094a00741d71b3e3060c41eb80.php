<?php $__env->startSection('title', 'Admin Panel'); ?>

<?php $__env->startSection('head'); ?>
    <style>
        *{
            color: black !important;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="your-div"></div>






<?php $__env->stopSection(); ?>

<?php $__env->startSection('foot'); ?>
    <script>

        function reloadDiv() {
            $.ajax({
                url: "<?php echo e(route('admin_index' )); ?>",
                type: "GET",
                success: function(response) {
                    $('#your-div').html(response);
                },
                error: function(xhr) {
                    // Handle any error that may occur during the request
                }
            });
        }

        // Call the function to reload the div initially
        /*reloadDiv();*/

        // Set up the interval to reload the div every 30 seconds
        /*setInterval(reloadDiv, 30000); // 30 seconds = 30000 milliseconds*/
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminbase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BFT\Project\Laravel\project_x\resources\views/admin/index.blade.php ENDPATH**/ ?>