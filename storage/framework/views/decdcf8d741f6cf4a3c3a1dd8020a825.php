<!-- resources/views/admin/users/show.blade.php -->



<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>User Details</h1>
                <div class="card">
                    <div class="card-header">User Details</div>
                    <div class="card-body">
                        <p><strong>Name:</strong> <?php echo e($user->name); ?></p>
                        <p><strong>Email:</strong> <?php echo e($user->email); ?></p>
                        <p><strong>Created At:</strong> <?php echo e($user->created_at); ?></p>
                        <p><strong>Updated At:</strong> <?php echo e($user->updated_at); ?></p>
                        <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-primary">Edit User</a>
                        <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST" style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete User</button>
                        </form>
                    </div>
                </div>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DATN\resources\views/admin/user/show.blade.php ENDPATH**/ ?>