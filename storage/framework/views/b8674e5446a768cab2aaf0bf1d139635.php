<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Manage Tour Attributes</h1>
                <a href="<?php echo e(route('tourAttributes.create')); ?>" class="btn btn-primary mb-3">Add New Tour Attribute</a>
                <div class="card">
                    <div class="card-header">Tour Attributes List</div>
                    <div class="card-body">
                        <script>
                            <?php if(session('success')): ?>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: '<?php echo e(session('success')); ?>',
                                });
                            <?php endif; ?>

                            <?php if($errors->any()): ?>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    html: '<?php echo implode('<br>', $errors->all()); ?>',
                                });
                            <?php endif; ?>
                        </script>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Attribute</th>
                                    <th>Tour</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $tourAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tourAttribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($tourAttribute->id); ?></td>
                                        <td><?php echo e($tourAttribute->attribute->attribute); ?></td>
                                        <td><?php echo e($tourAttribute->tour->title); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('tourAttributes.edit', $tourAttribute->id)); ?>"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="<?php echo e(route('tourAttributes.destroy', $tourAttribute->id)); ?>"
                                                method="POST" style="display: inline-block;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this tour attribute?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DATN\resources\views/admin/tour_attribute/show.blade.php ENDPATH**/ ?>