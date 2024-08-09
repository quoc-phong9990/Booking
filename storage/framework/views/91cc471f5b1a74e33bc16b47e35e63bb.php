<?php $__env->startSection('content'); ?>
    <h1>Danh sách ảnh banner</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Banner</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $bannerImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bannerImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($bannerImage->id); ?></td>
                    <td><img src="<?php echo e(asset('storage/' . $bannerImage->image)); ?>" alt="Banner Image" width="100"></td>
                    <td><?php echo e($bannerImage->banner->title); ?></td>
                    <td>
                        <a href="<?php echo e(route('bannerimage.show', $bannerImage)); ?>" class="btn btn-primary">Xem</a>
                        <a href="<?php echo e(route('bannerimage.edit', $bannerImage)); ?>" class="btn btn-secondary">Sửa</a>
                        <form action="<?php echo e(route('bannerimage.destroy', $bannerImage)); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <a href="<?php echo e(route('bannerimage.create')); ?>" class="btn btn-success">Tạo ảnh banner mới</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DATN\resources\views/admin/BannerImage/index.blade.php ENDPATH**/ ?>