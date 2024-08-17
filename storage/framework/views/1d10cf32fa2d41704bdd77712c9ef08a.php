<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Quản lý bài viết</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('posts.index')); ?>">Posts</a></li>
                            <li class="breadcrumb-item active"><a href="<?php echo e(route('posts.create')); ?>">Create</a></li>
                        </ol>
                    </div>

                </div>
            </div>
            <div class="col-md-12 card">
                <div class="row">
                    <strong class="card-header border-0 fs-5">Thêm bài viết mới</strong>
                    <div class="card-body">
                        <form class="tablelist-form" autocomplete="off" action="<?php echo e(route('posts.store')); ?>" method="post"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="mb-3 col-5">
                                        <label for="customername-field" class="form-label">Tiêu đề
                                        </label>

                                        <input type="text" id="customername-field" class="form-control" name="title"
                                            value="<?php echo e(old('title')); ?>">
                                        <?php $__errorArgs = ['title'];
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
                                    <div class="mb-3 col-5">
                                        <label for="customername-field" class="form-label">Ảnh đại diện
                                        </label>

                                        <input type="file" name="file" class="form-control"
                                            onchange="document.getElementById('thumbnail').src = window.URL.createObjectURL(this.files[0])">
                                        <?php $__errorArgs = ['file'];
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
                                    <div class="col-2">
                                        <label for="date-field" class="form-label">Kích hoạt
                                        </label>
                                        <div class="form-check form-switch">

                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                                name="is_active" checked value="1" id="active">
                                        </div>
                                    </div>
                                    <img id="thumbnail" src="" style="max-width: 200px; max-height:200px;" />

                                </div>

                                <div class="mt-3">
                                    <label for="customername-field" class="form-label">Nội dung
                                    </label>
                                    <textarea name="body" class="ckeditor-classic form-control"><?php echo e(old('description')); ?>

                                                </textarea>
                                    <?php $__errorArgs = ['body'];
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
                            </div>
                            <div class="modal-footer mt-3">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="submit" class="btn btn-success" id="add-btn">Thêm
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Desktop\laragon\www\DEAH-Booking\resources\views/admin/Posts/add.blade.php ENDPATH**/ ?>