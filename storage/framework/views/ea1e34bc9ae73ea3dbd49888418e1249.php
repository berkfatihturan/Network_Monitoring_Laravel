<?php $__env->startSection('title', 'Admin Panel'); ?>

<?php $__env->startSection('head'); ?>
    <!--<meta http-equiv="refresh" content="30">-->
    <script>

        function showUpdateForm(ths, id) {

            var dugmeOffset = $(ths).offset();
            $("#updateForm").css({
                top: dugmeOffset.top + "px",
                left: (dugmeOffset.left-130) + "px"
            });

            $("#updateForm").find('input[name="id"]').val(id);

            $("#updateForm").toggle();
            $("body").toggleClass("blur");
        }

        function cancelUpdate() {

            $("#updateForm").find('input[name="id"]').val("");
            $("#updateForm").find('input[name="server_name"]').val("");
            $("#updateForm").find('input[name="ip"]').val("");

            $("#updateForm").toggle();
            $("body").toggleClass("blur");
        }

    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="section_header">
        <h1 id="admin_section_title">PORTS</h1>
        <a class="btn btn-info addButton" onclick="toggleCollapse()"> <i class="fa-solid fa-plus"
                                                                         style="color: white"></i> ADD
        </a>
    </div>

    <div id="collapseForm" style="display: none;">
        <form action="<?php echo e(route('admin_ports_store')); ?>" method="POST" enctype="multipart/form-data" class="row">
            <?php echo csrf_field(); ?>
            <div class="col-lg-3 col-sm-12">
                <label for="fname">Ip:</label><br>

                <select  name="server_id">
                    <?php $__currentLoopData = $serverData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->ip); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select><br>
            </div>
            <div class="col-lg-3 col-sm-12">
                <label for="fname">Port Name:</label><br>
                <input type="text" name="port_name"><br>
            </div>
            <div class="col-lg-3 col-sm-12">
                <label for="lname">Port:</label><br>
                <input type="text" name="port"><br><br>
            </div>

            <div>
                <p style="margin-bottom: 5px"><label for="detail">Details:</label></p>
                <textarea  name="detail" rows="4" style="width:80vw"></textarea>
            </div>

            <div class="col-lg-3 col-sm-12">
                <input type="submit" value="Submit"
                       style="background-color: black; color: white; padding: 10px; border-radius: 10px; margin-top: 10px;">
            </div>
        </form>
    </div>


    <div class="table">
        <div class="table-header">
            <div class="header__item id"><a id="name" class="filter__link" href="#">Id</a></div>
            <div class="header__item"><a id="name" class="filter__link" href="#">Server Ip</a></div>
            <div class="header__item"><a id="name" class="filter__link" href="#">Port Name</a></div>
            <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">PORT</a></div>
            <div class="header__item"><a id="draws" class="filter__link filter__link--number" href="#">Status</a>
            </div>
            <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">Update Date</a>
            </div>
            <div class="header__space" style="width: 200px"></div>
        </div>
        <div class="table-content">
            <?php $__currentLoopData = $portData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="table-row <?php if($item->status): ?>  <?php else: ?> out-of-servis <?php endif; ?>" id="<?php echo e($item->id); ?>" id="<?php echo e($item->id); ?>">
                    <?php echo $__env->make('admin.ports.table_item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div id="updateForm"><?php echo $__env->make('admin.ports.update', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('foot'); ?>
    <script>

        var reloadTime = 5000

        const divElements = [
                <?php $__currentLoopData = $portData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            {
                selector: '#<?php echo e($item->id); ?>', interval: reloadTime
            }, // Reload every 30 seconds
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ];

        function reloadDiv(element) {

            var id = $(element.selector).attr('id');
            var is_open = $(element.selector).find(".port_detail_text").css("display");
            var url = "<?php echo e(route('admin_ports_reloadPage', ['id_item' => ':id','is_open' => ':is_open'])); ?>";
            url = url.replace(':id', id);
            url = url.replace(':is_open', is_open);

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

<?php echo $__env->make('layouts.adminbase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BFT\Project\Laravel\project_x\resources\views/admin/ports/index.blade.php ENDPATH**/ ?>