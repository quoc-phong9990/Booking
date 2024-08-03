

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create Tour Type</h1>
                <div class="card">
                    <div class="card-header">Create Tour Type</div>
                    <div class="card-body">
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <form action="<?php echo e(route('tourTypes.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-group mb-3">
                                <label for="attribute_id">Loại hình du lịch:</label>
                                <input type="text" class="form-control" id="name_type" name="name_type" value="<?php echo e(old('name_type')); ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Tour Attribute</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DATN\resources\views/admin/tour_types/create.blade.php ENDPATH**/ ?>