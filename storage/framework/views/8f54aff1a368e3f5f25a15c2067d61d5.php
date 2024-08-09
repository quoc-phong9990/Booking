<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Districts</h1>

        <a href="<?php echo e(route('districts.create')); ?>" class="btn btn-primary mb-3">Create New District</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Province</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($district->id); ?></td>
                        <td><?php echo e($district->province->name); ?></td>
                        <td><?php echo e($district->name); ?></td>
                        <td>
                            <a href="<?php echo e(route('districts.show', $district)); ?>" class="btn btn-info btn-sm">View</a>
                            <a href="<?php echo e(route('districts.edit', $district)); ?>" class="btn btn-primary btn-sm">Edit</a>
                            <form action="<?php echo e(route('districts.destroy', $district)); ?>" method="POST" style="display: inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DATN\resources\views/admin/Districts/index.blade.php ENDPATH**/ ?>