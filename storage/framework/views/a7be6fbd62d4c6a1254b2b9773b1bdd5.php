

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Hotel Images</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="<?php echo e(route('hotel_images.create')); ?>"> Create New Hotel Image</a>
                </div>
            </div>
        </div>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Hotel</th>
                <th>Image</th>
                <th width="280px">Action</th>
            </tr>
            <?php $__currentLoopData = $hotelImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotelImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($hotelImage->id); ?></td>
                <td><?php echo e($hotelImage->hotel->name); ?></td>
                <td><img src="<?php echo e(asset('images/'.$hotelImage->image)); ?>" width="100px"></td>
                <td>
                    <form action="<?php echo e(route('hotel_images.destroy',$hotelImage->id)); ?>" method="POST">
                        <a class="btn btn-primary" href="<?php echo e(route('hotel_images.edit',$hotelImage->id)); ?>">Edit</a>
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
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DATN\resources\views/admin/Hotel_images/show.blade.php ENDPATH**/ ?>