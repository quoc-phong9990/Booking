

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Hotel Services</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="<?php echo e(route('hotel_services.create')); ?>"> Create New Hotel Service</a>
                </div>
            </div>
        </div>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Hotel</th>
                <th>Services</th>
                <th width="280px">Action</th>
            </tr>
            <?php $__currentLoopData = $hotelServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotelService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($hotelService->id); ?></td>
                <td><?php echo e($hotelService->hotel->name); ?></td>
                <td><?php echo e($hotelService->service->service); ?></td>
                <td>
                    <form action="<?php echo e(route('hotel_services.destroy',$hotelService->id)); ?>" method="POST">
                        <a class="btn btn-primary" href="<?php echo e(route('hotel_services.edit',$hotelService->id)); ?>">Edit</a>
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DATN\resources\views/admin/Hotel_services/show.blade.php ENDPATH**/ ?>