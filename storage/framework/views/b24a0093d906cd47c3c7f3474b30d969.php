<?php $__env->startSection('title', 'Admin Panel'); ?>

<?php $__env->startSection('head'); ?>
    <style>
        #sidebar {
            display: none !important;
        }

        #user-info {
            display: none;
        }

        main {
            margin-left: 3% !important;
            width: 95% !important;
            overflow: auto;
        }

        #device {
            border-block: 1px solid #ddd;
            width: 95vw;
        }

        #device th, #device td {
            border-bottom: 1px solid #ddd;
            padding: 10px;
        }

        #device tr:nth-child(odd) {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246/var(--tw-bg-opacity));

        }


        #device th {
            padding-left: 20px !important;
            width: 25%;
        }


        #port_list {
            list-style: none;
            padding: 0 !important;
        }

        #port_list li {
            display: inline-block;
            font-size: 0.9rem;
            padding: 5px 10px;
            margin: 10px;
            width: fit-content;
            background: var(--sidebar-background_color);
            color: var(--sidebar-text_color);
            border-radius: 9px;
        }

        #port_list li i {
            padding-left: 5px;
            font-size: 1rem;
            position: relative;
            top: 1px;
        }

        #port_list li i:hover {
            color: red;
        }

        @media only screen and (max-width: 992px) {

        }


    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="section_header">
        <h1 id="admin_section_title"><?php echo e(optional($portData)->port_name); ?></h1>
    </div>

    <table id="device" style="">
        <tr>
            <th class="item_checkbox">Id</th>
            <td class="item_checkbox"><?php echo e(optional($portData)->id); ?></td>
        </tr>

        <tr>
            <th class="item_name">Name</th>
            <td class="item_name"><?php echo e(optional($portData)->port_name); ?></td>
        </tr>

        <tr>
            <th class="">Port</th>
            <td class=""><?php echo e(optional($portData)->port); ?></td>
        </tr>

        <tr>
            <th class="">Server Name</th>
            <td class=""><?php echo e(optional($portData->server)->server_name); ?></td>
        </tr>

        <tr>
            <th class="">Server Ip</th>
            <td class=""><?php echo e(optional($portData->server)->ip); ?></td>
        </tr>


        <tr>
            <th class="">Status</th>
            <td class="">
                <span class="status-info" style="display: none"><?php echo e($portData->status); ?></span>
                <?php if($portData->status): ?>
                    <i class="fa-solid fa-square-check" style="color: green; font-size: 2rem; content: 'out'"></i>
                <?php else: ?>
                    <span class="btn btn-danger"
                          style="font-weight: 600; font-size: 0.9rem; padding: 5px">OUT OF SERVER</span>
                <?php endif; ?>
            </td>
        </tr>

        <tr>
            <th class="">Update Date</th>
            <td class=""><?php echo e($portData->updated_at); ?></td>
        </tr>

        <tr>
            <th class="">Created at</th>
            <td class=""><?php echo e($portData->created_at); ?></td>
        </tr>

        <tr>
            <th class="">Notes</th>
            <td class=""><?php echo e($portData->detail); ?></td>
        </tr>

        <tr>
            <th class="">Log</th>
            <td class="" style="width: 100%">
                <ul>
                    <?php $__currentLoopData = $logData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($item->operation); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
            </td>
        </tr>


    </table>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('foot'); ?>
    <script>


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminbase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH X:\BFT\Project\Laravel\project_x\resources\views/admin/ports/show.blade.php ENDPATH**/ ?>