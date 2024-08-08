<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Hotel Comments</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="<?php echo e(route('hotel_comments.create')); ?>"> Create New Hotel Comment</a>
                </div>
            </div>
        </div>

        <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success">
                <p><?php echo e($message); ?></p>
            </div>
        <?php endif; ?>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Comments</th>
                <th>Hotel</th>
                <th>User</th>
                <th width="280px">Action</th>
            </tr>
            <?php $__currentLoopData = $hotelComments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotelComment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($hotelComment->id); ?></td>
                <td><?php echo e($hotelComment->comments); ?></td>
                <td><?php echo e($hotelComment->hotel->name); ?></td>
                <td><?php echo e($hotelComment->user->name); ?></td>
                <td>
                    <form action="<?php echo e(route('hotel_comments.destroy',$hotelComment->id)); ?>" method="POST">
                        <a class="btn btn-primary" href="<?php echo e(route('hotel_comments.edit',$hotelComment->id)); ?>">Edit</a>
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
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DATN\resources\views/admin/Hotel_comments/index.blade.php ENDPATH**/ ?>