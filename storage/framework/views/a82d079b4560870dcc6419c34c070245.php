<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Quản lý thuộc tinh</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('attributes.index')); ?>">Attributes</a></li>
                            <li class="breadcrumb-item active"><a href="F<?php echo e(route('attributes.index')); ?>">List</a></li>
                        </ol>
                    </div>

                </div>
            </div>
            <div class="col-md-8 card">
                <div class="row">
                    <div class="card-header">Danh sách thuộc tính</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Thuộc tính</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($attributes) > 0): ?>
                                    <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($index + 1); ?></td>
                                            <td><?php echo e($attribute->attribute); ?></td>
                                            <td class="">

                                                <button class="btn">
                                                    <i class="ri-pencil-fill showEdit fs-5 text-warning align-items-center"
                                                        data-bs-toggle="modal" data-bs-target="#showModal"
                                                        data-edit-value="<?php echo e($attribute->attribute); ?>"
                                                        data-edit-id="<?php echo e($attribute->id); ?>"></i>
                                                </button>

                                                <form action="<?php echo e(route('attributes.destroy', $attribute->id)); ?>"
                                                    method="POST" style="display: inline-block;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn "
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa thuộc tính này không?')">
                                                        <i class="ri-delete-bin-7-fill fs-5 text-danger"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <td class="fw-bold">Không có dữ liệu</td>
                                <?php endif; ?>

                            </tbody>
                        </table>
                        <?php echo e($attributes->links()); ?>

                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <form class="tablelist-form" autocomplete="off" id="addService" method="post"
                    action="<?php echo e(route('attributes.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div>
                        <label for="date-field" class="form-label">Thuộc tính
                        </label>
                        <input type="text" class="form-control" name="attribute">
                        <?php $__errorArgs = ['attribute'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger fw-light "><i><?php echo e($message); ?></i></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light p-3">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="close-modal"></button>
                    </div>
                    <div id="formEdit">

                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('.showEdit').click(function() {
                let id = $(this).attr('data-edit-id');
                let value = $(this).attr('data-edit-value');
                let form = `
                    <form class="tablelist-form" autocomplete="off" action="<?php echo e(route('attribute.update')); ?>" method="post" >
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="customername-field" class="form-label">Thuộc tính
                                </label>
                                <input type="hidden" id="customername-field" class="form-control" name="id" value="${id}"
                                     >
                                <input type="text" id="customername-field" class="form-control" name="attribute" value="${value}"
                                     >
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-success" id="add-btn">Cập nhật
                                    </button>
                            </div>
                        </div>
                    </form>`;
                $('#formEdit').html(form);
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Desktop\laragon\www\DEAH-Booking\resources\views/admin/Attributes/index.blade.php ENDPATH**/ ?>