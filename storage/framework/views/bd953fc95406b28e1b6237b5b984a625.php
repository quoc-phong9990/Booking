<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Itinerary</h1>
            <div class="card">
                <div class="card-header">Edit Itinerary</div>
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
                    <form action="<?php echo e(route('itineraries.update', $itinerary->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="form-group">
                            <label for="tour_id">Tour:</label>
                            <select class="form-control" id="tour_id" name="tour_id" required>
                                <?php $__currentLoopData = $tours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tour->id); ?>" <?php echo e($tour->id == $itinerary->tour_id ? 'selected' : ''); ?>><?php echo e($tour->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="day">Day:</label>
                            <input type="number" class="form-control" id="day" name="day" value="<?php echo e($itinerary->day); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo e($itinerary->title); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="itinerary">Itinerary:</label>
                            <textarea class="form-control" id="itinerary" name="itinerary" rows="4" required><?php echo e($itinerary->itinerary); ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Itinerary</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DATN\resources\views/admin/itineraries/edit.blade.php ENDPATH**/ ?>