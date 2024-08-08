<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('attributes.store')); ?>" enctype="multipart/form-data" method="post">
        <?php echo csrf_field(); ?>
        <label for="" class="form-label">Attribute</label>
        <input type="text" name="attribute" id="attribute" class="form-control">
        <button type="submit">Thêm</button>
        <?php $__errorArgs = ['attribute'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p style="color: red" class="alert"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DATN\resources\views/admin/Attributes/add.blade.php ENDPATH**/ ?>