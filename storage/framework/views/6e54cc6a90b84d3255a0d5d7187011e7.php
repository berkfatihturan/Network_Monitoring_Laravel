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
                <td style="padding-block: 0">
                    <span id="temp"><?php echo e(optional($deviceData)->temp); ?></span>°C
                    <span class="mail_settings" style="margin-left: 22px;"> If it is less than <input name="mailTemp" type="number" min="0" style="width: 50px;" value="<?php echo e(optional($deviceData->mailSettings)->temp); ?>"> °C and higher than <input name="mailTempMax" type="number" min="0" style="width: 50px;" value="<?php echo e(optional($deviceData->mailSettings)->temp_max); ?>"> °C, Send Mail</span>
                </td>
            </tr>

            <tr>
                <th class="">Humidity</th>
                <td style="padding-block: 0"><span id="humidity"><?php echo e(optional($deviceData)->humidity); ?></span>%
                    <span class="mail_settings"> If it is less than <input name="mailHumidity" type="number" min="0" style="width: 50px;" value="<?php echo e(optional($deviceData->mailSettings)->humidity); ?>"> % and higher than <input name="mailHumidityMax" type="number" min="0" style="width: 50px;" value="<?php echo e(optional($deviceData->mailSettings)->humidity_max); ?>"> %, Send Mail</span>
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

                    <input type="submit" value="SAVE"
                           style="background-color: black; color: white; padding: 3px 10px; border-radius: 10px; margin-left: 10px">

                    <?php if(\Illuminate\Support\Facades\Session::get('error')!=null): ?>
                        <?php echo e(\Illuminate\Support\Facades\Session::get('error')); ?>

                    <?php endif; ?>

                </td>

            </tr>

            <tr style="background: white">
                <th class=""></th>
                <td id="dataset_chart" style="position: relative; right: 100px; max-width: 90vw; overflow: auto">
                    <?php echo $__env->make('admin.devices.dataset_chart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </td>
            </tr>

            <tr>
                <th class="">Log</th>
                <td id="log_table">
                    <?php echo $__env->make('admin.devices.log_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </td>
            </tr>
        </form>
    </table>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('foot'); ?>
    <script>

        var reloadTime = 30000 // Reload every 30 seconds

        const divElements = [

            {
                selector: '#temp', interval: reloadTime
            },
            {
                selector: '#humidity', interval: reloadTime
            },
            {
                selector: '#dataset_chart', interval: reloadTime
            },
            {
                selector: '#log_table', interval: reloadTime
            }
        ];

        function reloadDiv(element) {

            var device_id = <?php echo e($deviceData->id); ?>;
            var data_name = $(element.selector).attr('id');
            var url = "<?php echo e(route('admin_devices_reloadShowPage', ['data_name' => ':data_name','device_id' => ':device_id'])); ?>";
            url = url.replace(':device_id', device_id);
            url = url.replace(':data_name', data_name);

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

<?php echo $__env->make('layouts.adminbase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH X:\BFT\Project\Laravel\project_x\resources\views/admin/devices/detail.blade.php ENDPATH**/ ?>