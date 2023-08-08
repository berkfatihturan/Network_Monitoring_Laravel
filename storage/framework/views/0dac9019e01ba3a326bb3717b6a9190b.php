<?php $__env->startSection('title', 'Admin Panel'); ?>

<?php $__env->startSection('head'); ?>
    <style>
        #users {
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            border-collapse: collapse;
            width: 100%;

        }

        .table-form-box {
            margin-top: 24px;
            margin-bottom: 10px;
        }

        #users td, #users th {
            border-bottom: 1px solid #ddd;
            padding: 20px;
            padding-left: 40px;
        }


        #users tr:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246/var(--tw-bg-opacity));
        }

        #users th {
            --tw-bg-opacity: 1;
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: rgb(243 244 246/var(--tw-bg-opacity));
            color: #6b7280;
            font-size: 12px;
        }

        #users td {
            font-size: 16px;
            font-weight: bold;
        }

        .item_checkbox {
            width: 0%;
        }

        .item_status svg {
            padding-right: 8px;
            position: relative;
            bottom: 2px;
        }

        .item_settings {
            width: 10%;

        }

        .item_settings i {
            font-size: 1.5rem;
            padding: 7px;
            border-radius: 5px;
        }

        .item_settings i:hover {
            background: #9ca3af;
        }

        @media only screen and (max-width: 992px) {
            .table-form-box {
                width: 95vw !important;
                max-height: 66vh;
                overflow: auto;
                margin-bottom: 5px;
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="section_header">
        <h1 id="admin_section_title">DEVİCES</h1>
    </div>


    <div class="table-form-box">
        <table id="users">
            <tr>
                <th class="item_checkbox">Id</th>
                <th class="item_name">NAME</th>
                <th class="item_email">TEMPERATURE</th>
                <th class="item_email">HUMIDITY</th>
                <th class="item_settings"></th>
            </tr>
            <?php $__currentLoopData = $deviceData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="<?php echo e($item->id); ?>">
                    <?php echo $__env->make('admin.devices.table_item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('foot'); ?>
    <script>

        var reloadTime = 5000

        const divElements = [
                <?php $__currentLoopData = $deviceData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            {
                selector: '#<?php echo e($item->id); ?>', interval: reloadTime
            }, // Reload every 30 seconds
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ];

        function reloadDiv(element) {

            var id = $(element.selector).attr('id');
            var url = "<?php echo e(route('admin_devices_reloadPage', ['id_item' => ':id'])); ?>";
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: "GET",
                success: function (response) {
                    $(element.selector).html(response);
                },
                error: function (xhr) {
                    // Handle any error that may occur during the request
                }
            });
        }

        // Function to initiate the reloading of all div elements
        function reloadAllDivs() {
            for (let i = 0; i < divElements.length; i++) {
                reloadDiv(divElements[i]);
            }
        }

        // Call the function to reload all div elements initially
        reloadAllDivs();

        // Set up intervals for each div element
        for (let i = 0; i < divElements.length; i++) {
            setInterval(function (i) {
                return function () {
                    reloadDiv(divElements[i]);
                };
            }(i), divElements[i].interval);
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminbase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH X:\BFT\Project\Laravel\project_x\resources\views/admin/devices/index.blade.php ENDPATH**/ ?>