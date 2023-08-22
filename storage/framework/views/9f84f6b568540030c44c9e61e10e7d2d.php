<header>
    <div class="header-title" onclick="location.href='<?php echo e(route('admin_index')); ?>';" style="cursor: pointer">
        <?php if($settingsData->logo): ?>
            <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($settingsData->logo)); ?>" style="object-fit: cover; max-height: 60px">
        <?php else: ?>
            <img src="<?php echo e(asset('assets')); ?>/admin/img/logo.png" style="object-fit: cover; width: 10vw; max-height: 70px">
        <?php endif; ?>
    </div>
    <div class="user-info" id="user-info">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
           data-bs-toggle="dropdown" aria-expanded="false">
            <span class="user-profile"><?php echo e(Auth::user()->name[0]); ?></span>
            <p class="" style="padding-left: 5px; font-size: 1.6rem"><?php echo e(Auth::user()->name); ?></p>
        </a>


        <ul class="dropdown-menu">
            <li class="dropdown-menu_profile_name"><a href="<?php echo e(route('admin_profile_index')); ?>" class="float-end " style="font-size: 1.3rem!important;"><?php echo e(Auth::user()->name); ?></a></li>
            <li ><a href="<?php echo e(route('dashboard')); ?>" class="float-end"><i class="fa-solid fa-table-columns"></i>Dashboard</a></li>
            <li ><a href="<?php echo e(route('logoutuser')); ?>" class="float-end"><i class="fa-solid fa-right-from-bracket ml-4"></i>LogOut</a></li>
        </ul>

    </div>
</header>

<?php /**PATH X:\BFT\Project\Laravel\project_x\resources\views/admin/header.blade.php ENDPATH**/ ?>