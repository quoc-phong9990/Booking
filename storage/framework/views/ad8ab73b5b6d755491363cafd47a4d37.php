<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Vouchers</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('vouchers.index')); ?>">Vouchers</a></li>
                                <li class="breadcrumb-item active"><a href="<?php echo e(route('vouchers.index')); ?>">List</a></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <h1>Manage Vouchers</h1>
                <a href="<?php echo e(route('vouchers.create')); ?>" class="btn btn-primary mb-3">Add New Voucher</a>
                <div class="card">
                    <div class="card-header">Voucher List</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Voucher</th>
                                    <th>Title</th>
                                    <th>Qty</th>
                                    <th>Type</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $vouchers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voucher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($voucher->voucher); ?></td>
                                        <td><?php echo e($voucher->title); ?></td>
                                        <td><?php echo e($voucher->qty); ?></td>
                                        <td><?php echo e($voucher->discount_type == 1 ? 'Giảm Phần Trăm' : 'Giảm Tiền'); ?></td>
                                        <td><?php echo e($voucher->start); ?></td>
                                        <td><?php echo e($voucher->end); ?></td>
                                        <td>
                                            <?php
                                                echo $voucher->is_active == 1
                                                    ? '<span class="badge bg-success-subtle text-success text-uppercase">Active</span>'
                                                    : '<span class="badge bg-success-subtle text-danger text-uppercase">Block</span>';
                                            ?>
                                        </td>
                                        <td>

                                            <a href="<?php echo e(route('vouchers.edit', $voucher->id)); ?>"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="<?php echo e(route('vouchers.destroy', $voucher->id)); ?>" method="POST"
                                                style="display: inline-block;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this tour?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <?php echo e($vouchers->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DATN\resources\views/admin/vouchers/index.blade.php ENDPATH**/ ?>