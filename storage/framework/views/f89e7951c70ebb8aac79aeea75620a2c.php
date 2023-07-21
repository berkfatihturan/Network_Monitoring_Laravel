<a onclick="cancelUpdate()"><i class="fa-solid fa-xmark"></i></a>
<p>UPDATE</p>
<hr/>

<form action="<?php echo e(route('admin_server_update')); ?>" method="POST" enctype="multipart/form-data" >
    <?php echo csrf_field(); ?>
    <input type="hidden" name="id">

    <label for="fname">Server Name:</label><br>
    <input type="text" name="server_name"><br>


    <label for="lname">Ip:</label><br>
    <input type="text" name="ip"><br>


    <input type="submit" value="Submit"
           style="background-color: black; color: white; padding: 10px; border-radius: 10px; margin-top: 10px;">

</form>
<?php /**PATH D:\BFT\Project\Laravel\project_x\resources\views/admin/server/update.blade.php ENDPATH**/ ?>