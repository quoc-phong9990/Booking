<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Quản lý bài viết</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('posts.index')); ?>">Posts</a></li>
                            <li class="breadcrumb-item active"><a href="<?php echo e(route('posts.index')); ?>">List</a></li>
                        </ol>
                    </div>

                </div>
            </div>
            <div class="col-md-12 card">
                <div class="">
                    <div class="card-header d-flex justify-content-between">
                        <strong class="card-header border-0 fs-5">Danh sách bài viết</strong>
                        <div>
                            <a href="<?php echo e(route('posts.create')); ?>" class="btn btn-primary mb-3">Thêm bài viết mới</a>

                        </div>

                    </div>
                    <div class="filter mt-2">
                        <form action="<?php echo e(route('posts.index')); ?>" method="get">
                            <div class="row">
                                <div class="col-4 form-group">
                                    <div class="d-inline-flex w-100">
                                        <div style="width: calc(100%); margin-left: 15px">
                                            <input type="text" name="title" id=""
                                                placeholder="Tiêu đề bài viết" value="<?php echo e(request()->title); ?>"
                                                class="form-control mt-2">
                                        </div>

                                    </div>


                                </div>
                                <div class="col-4 form-group">
                                    <div class="d-inline-flex w-100">

                                        <div style="width: calc(40%); ">

                                            <select class="form-control mt-2" name="is_active">
                                                <option value="" selected>Trạng thái</option>
                                                <option <?php if(request()->is_active == 1): ?> selected <?php endif; ?> value="1">
                                                    Kích hoạt</option>
                                                <option <?php if(isset(request()->is_active) && request()->is_active == 0): ?> selected <?php endif; ?> value="0">
                                                    Khóa</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 form-group mt-2">
                                    <div class="pull-right " style="margin-bottom: 15px">
                                        <a href="<?php echo e(route('posts.index')); ?>" class="btn btn-primary">
                                            Bỏ lọc
                                        </a>
                                        <button type="submit" class="btn btn-info">Lọc</button>
                                    </div>
                                </div>


                            </div>
                        </form>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ảnh đại diện</th>
                                    <th>Tiêu đề</th>
                                    <th>Ngày đăng</th>
                                    <th>Kích hoạt</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($posts)>0): ?>
                                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($index + 1); ?></td>
                                            <td>
                                                <img src="<?php echo e(asset($post->thumbnail)); ?>" alt="" width="100px"
                                                    height="100px">
                                            </td>
                                            <td>
                                                <?php echo nl2br(wordwrap($post->title, 70, "\n", true)); ?>

                                            </td>
                                            <td><?php echo e($post->created_at->format('d-m-Y')); ?></td>
                                            <td>
                                                <?php
                                                    echo $post->is_active == 1
                                                        ? '<span class="badge bg-success-subtle text-success text-uppercase">Kích hoạt</span>'
                                                        : '<span class="badge bg-success-subtle text-danger text-uppercase">Khóa</span>';
                                                ?>
                                            </td>
                                            <td class="d-flex gap-4">
                                                <a name="" id="" class=""
                                                    href="<?php echo e(route('posts.show', $post->id)); ?>" role="button"> <i
                                                        class="ri-eye-fill fs-5 "></i>
                                                </a>
                                                <a name="" id="" class="  "
                                                    href="<?php echo e(route('posts.edit', $post->id)); ?>" role="button">


                                                    <i class="ri-pencil-fill fs-5 text-warning"></i>
                                                </a>
                                                <form action="<?php echo e(route('posts.destroy', $post->id)); ?>" method="POST"
                                                    style="display: inline-block;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn border-0 border-spacing-0 p-0"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')">
                                                        <i class="ri-delete-bin-7-fill fs-5 text-danger"></i></button>
                                                </form>


                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <td class="fw-bold">Không có dữ liệu</td>
                                <?php endif; ?>

                            </tbody>
                        </table>
                        <?php echo e($posts->links()); ?>

                    </div>
                </div>

            </div>

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Desktop\laragon\www\DEAH-Booking\resources\views/admin/Posts/index.blade.php ENDPATH**/ ?>