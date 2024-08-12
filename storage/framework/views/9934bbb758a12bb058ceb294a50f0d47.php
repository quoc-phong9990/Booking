<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Create District</h1>

        <form action="<?php echo e(route('districts.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="province_id">Province</label>
                <select class="form-control" id="province_id" name="province_id">
                    <option value="">Select a province</option>
                    <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($province->id); ?>"><?php echo e($province->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <button type="submit" class="btn btn-primary">Create District</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DATN\resources\views/admin/Districts/add.blade.php ENDPATH**/ ?>