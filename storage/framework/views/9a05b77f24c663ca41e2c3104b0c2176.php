<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo e(route('itineraries.create')); ?>" class="btn btn-primary mb-3">Add New Itinerary</a>
            <h1>Manage Itineraries</h1>
            <div class="card">
                <div class="card-header">Itineraries List</div>
                <div class="card-body">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tour</th>
                                <th>Day</th>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $itineraries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itinerary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($itinerary->id); ?></td>
                                    <td><?php echo e($itinerary->tour->title); ?></td>
                                    <td><?php echo e($itinerary->day); ?></td>
                                    <td><?php echo e($itinerary->title); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('itineraries.show', $itinerary->id)); ?>" class="btn btn-primary btn-sm">View</a>
                                        <a href="<?php echo e(route('itineraries.edit', $itinerary->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="<?php echo e(route('itineraries.destroy', $itinerary->id)); ?>" method="POST" style="display: inline-block;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this itinerary?')">Delete</button>
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

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DATN\resources\views/admin/itineraries/show.blade.php ENDPATH**/ ?>