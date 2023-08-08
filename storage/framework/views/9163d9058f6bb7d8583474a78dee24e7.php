<?php $__env->startSection('title', 'Admin Panel'); ?>

<?php $__env->startSection('head'); ?>
    <style>
        #users {
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            border-collapse: collapse;
            width: 100%;

        }

        .table-form-box{
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

        .item_status {

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
        <h1 id="admin_section_title">USERS</h1>
    </div>

    <form action="<?php echo e(route('admin_users_update')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="table-form-box">
            <table id="users">
                <tr>
                    <th class="item_checkbox"><input type="checkbox"></th>
                    <th class="item_name">NAME</th>
                    <th class="item_email">EMAIL</th>
                    <th class="item_status">STATUS</th>
                    <th></th>
                </tr>
                <?php $__currentLoopData = $userData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="item_checkbox"><input type="checkbox" name="is_allowed-<?php echo e($item->id); ?>" value="on"
                                                         <?php if( optional($item->user_login_permission)->is_allowed): ?> checked
                                                         <?php endif; ?>
                                                         <?php if( \Illuminate\Support\Facades\Auth::id() == $item->id): ?> style="pointer-events: none;"
                                <?php endif; ?>></td>
                        <td class="item_name"><?php echo e($item->name); ?></td>
                        <td class="item_email"><?php echo e($item->email); ?></td>
                        <td class="item_status"><?php if( optional($item->user_login_permission)->is_allowed): ?>
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" fill="green">
                                    <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M352 144c0-44.2 35.8-80 80-80s80 35.8 80 80v48c0 17.7 14.3 32 32 32s32-14.3 32-32V144C576 64.5 511.5 0 432 0S288 64.5 288 144v48H64c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V256c0-35.3-28.7-64-64-64H352V144z"/>
                                </svg>Authorized
                            <?php else: ?>
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" fill="red">
                                    <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/>
                                </svg>No Authority
                            <?php endif; ?></td>
                        <td class="item_delete"><a class="btn btn-danger" href="<?php echo e(route('admin_users_destroy',['id' => $item->id])); ?>" <?php if( \Illuminate\Support\Facades\Auth::id() == $item->id): ?> style="pointer-events: none;"
                                <?php endif; ?>>
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" fill="white">
                                    <path
                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                </svg>
                                <b style="color: white; position: relative; top: 1.3px; padding-left: 2px">Delete</b>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </table>
        </div>
        <input type="submit" value="Submit"
               style="background-color: black; color: white !important; padding: 10px 30px; border-radius: 10px;">
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('foot'); ?>
    <script>


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminbase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH X:\BFT\Project\Laravel\project_x\resources\views/admin/users/index.blade.php ENDPATH**/ ?>