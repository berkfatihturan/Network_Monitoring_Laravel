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
        }


        #server_relation_list {
            list-style: none;
            padding: 0 !important;
        }

        #server_relation_list li {
            display: inline-block;
            font-size: 0.9rem;
            padding: 5px 10px;
            margin: 10px;
            width: fit-content;
            background: var(--sidebar-background_color);
            color: var(--sidebar-text_color);
            border-radius: 9px;
        }

        #server_relation_list li i {
            padding-left: 5px;
            font-size: 1rem;
            position: relative;
            top: 1px;
        }

        #server_relation_list li i:hover {
            color: red;
        }

        .mail_settings{
            margin-left: 25px;
            display: inline-block;
            padding: 5px 15px;

            border-inline: 1px solid #ddd;
            color: black;
        }

        @media only screen and (max-width: 992px) {
            .mail_settings{
                margin: 0px;
                display: inline-block;
                padding: 5px 0px;
                border-inline: none;
            }
            td{
                padding-top: 10px !important;
            }

            input[type=submit]{
                margin-top: 10px;
                width: 90%;
            }

            select{
                width: 100%;
            }

            table{
                margin-bottom: 20px;
            }
        }

        <!-- -->

        #my-chart.line {
            height: 200px;
            max-width: 400px;
            margin: 0 auto;
        }

    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="section_header">
        <h1 id="admin_section_title"><?php echo e(optional($deviceData)->name); ?></h1>
    </div>

    <table id="device" style="">
        <tr>
            <th class="item_checkbox">Id</th>
            <td class="item_checkbox"><?php echo e(optional($deviceData)->id); ?></td>
        </tr>

        <tr>
            <th class="item_name">Name</th>
            <td class="item_name"><?php echo e(optional($deviceData)->name); ?></td>
        </tr>

        <form action="<?php echo e(route('admin_devices_store',['id' => $deviceData->id])); ?>" method="POST"
              enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <tr>
                <th class="">Temperature</th>
                <td class="" style="padding-block: 0">
                    <?php echo e(optional($deviceData)->temp); ?>°C
                    <span class="mail_settings"> Set Mail Notification: <input name="mailTemp" type="number" min="0" style="width: 50px;" value="<?php echo e(optional($deviceData->mailSettings)->temp); ?>"></span>
                </td>
            </tr>

            <tr>
                <th class="">Humıdıty</th>
                <td class="" style="padding-block: 0"><?php echo e(optional($deviceData)->humidity); ?> %
                    <span class="mail_settings"> Set Mail Notification: <input name="mailHumidity" type="number" min="0" style="width: 50px;" value="<?php echo e(optional($deviceData->mailSettings)->humidity); ?>"></span>
                </td>
            </tr>

            <tr>
                <th class="">Servers</th>
                <td class="">
                    <ul id="server_relation_list">
                        <?php if(optional($deviceData)->servers): ?>
                            <?php $__currentLoopData = optional($deviceData)->servers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($item->ip); ?><i class="fa-regular fa-circle-xmark"
                                                    onclick="location.href='<?php echo e(route('admin_devices_destroy',['did'=>$deviceData->id,'sid' => $item->id])); ?>';"></i>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </td>


            </tr>

            <tr>

                <th>Add a Server</th>
                <td>
                    <select name="server_id">
                        <option selected value="*">-------------</option>
                        <?php $__currentLoopData = $serverData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!optional($item->devices->first())->id): ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->ip); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    <input type="submit" value="ADD"
                           style="background-color: black; color: white; padding: 3px 10px; border-radius: 10px; margin-left: 10px">

                    <?php if(\Illuminate\Support\Facades\Session::get('error')!=null): ?>
                        <?php echo e(\Illuminate\Support\Facades\Session::get('error')); ?>

                    <?php endif; ?>

                </td>

            </tr>

            <tr>
                <th class="">Log</th>
                <td >
                    <ul>
                        <?php $__currentLoopData = $logData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($item->operation); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </td>
            </tr>

            <tr>
                <th class="">DENEME</th>
                <td >
                    <?php echo $__env->make('admin.devices.dataset_chart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </td>
            </tr>
        </form>
    </table>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('foot'); ?>
    <script>


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminbase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH X:\BFT\Project\Laravel\project_x\resources\views/admin/devices/detail.blade.php ENDPATH**/ ?>