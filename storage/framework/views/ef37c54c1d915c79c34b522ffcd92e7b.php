<a onclick="cancelUpdate()"><i class="fa-solid fa-xmark"></i></a>
<p>UPDATE</p>
<hr/>

<form action="<?php echo e(route('admin_ports_update')); ?>" method="POST" enctype="multipart/form-data" >
    <?php echo csrf_field(); ?>
    <input type="hidden" name="id">

    <label for="fname">Ip:</label><br>

    <select  name="server_id">
        <?php $__currentLoopData = $serverData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($item->id); ?>"><?php echo e($item->ip); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select><br>

    <label for="fname">Port Name:</label><br>
    <input type="text" name="port_name"><br>

    <label for="lname">Port:</label><br>
    <input type="text" name="port"><br>

    <p style="margin-bottom: 5px"><label for="detail">Details:</label></p>
    <textarea name="detail" rows="4" style="width: 100%"></textarea>


    <input type="submit" value="Submit"
           style="background-color: black; color: white; padding: 10px; border-radius: 10px; margin-top: 10px;">

</form>
<?php /**PATH D:\BFT\Project\Laravel\project_x\resources\views/admin/ports/update.blade.php ENDPATH**/ ?>