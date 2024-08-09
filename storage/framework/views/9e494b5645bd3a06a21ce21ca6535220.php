<!-- resources/views/admin/tours/edit.blade.php -->


<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Tour</h1>
                <div class="card">
                    <div class="card-header">Edit Tour</div>
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
                        <form action="<?php echo e(route('tours.update', $tour->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo e($tour->title); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="type_id">Type:</label>
                                <select class="form-control" id="type_id" name="type_id" required>
                                    <?php $__currentLoopData = $tourTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($type->id); ?>" <?php echo e($tour->type_id == $type->id ? 'selected' : ''); ?>><?php echo e($type->name_type); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="province_id">Province:</label>
                                <select class="form-control" id="province_id" name="province_id" required>
                                    <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($province->id); ?>" <?php echo e($tour->province_id == $province->id ? 'selected' : ''); ?>><?php echo e($province->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="district_id">District:</label>
                                <select class="form-control" id="district_id" name="district_id" required>
                                    <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($district->id); ?>" <?php echo e($tour->district_id == $district->id ? 'selected' : ''); ?>><?php echo e($district->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ward_id">Ward:</label>
                                <select class="form-control" id="ward_id" name="ward_id" required>
                                    <?php $__currentLoopData = $wards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($ward->id); ?>" <?php echo e($tour->ward_id == $ward->id ? 'selected' : ''); ?>><?php echo e($ward->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="day">Day:</label>
                                <input type="number" class="form-control" id="day" name="day" value="<?php echo e($tour->day); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description" required><?php echo e($tour->description); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="map">Map:</label>
                                <input type="text" class="form-control" id="map" name="map" value="<?php echo e($tour->map); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="number" class="form-control" id="price" name="price" value="<?php echo e($tour->price); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="promotion">Promotion:</label>
                                <input type="text" class="form-control" id="promotion" name="promotion" value="<?php echo e($tour->promotion); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="private">Private:</label>
                                <input type="checkbox" id="private" name="private" <?php echo e($tour->private ? 'checked' : ''); ?>>
                            </div>
                            <div class="form-group">
                                <label for="views">Views:</label>
                                <input type="number" class="form-control" id="views" name="views" value="<?php echo e($tour->views); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="rate">Rate:</label>
                                <input type="number" class="form-control" id="rate" name="rate" value="<?php echo e($tour->rate); ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Tour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DATN\resources\views/admin/tours/edit.blade.php ENDPATH**/ ?>