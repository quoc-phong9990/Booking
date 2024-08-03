<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Quản lý chuyến du lịch</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('tours.index')); ?>">Tours</a></li>
                            <li class="breadcrumb-item active"><a href="<?php echo e(route('tours.index')); ?>">List</a></li>
                        </ol>
                    </div>

                </div>
            </div>
            <div class="col-md-12 card">
                <div class="card-header d-flex justify-content-between">
                    <strong class="card-header border-0 fs-5">Danh sách chuyến du lịch</strong>
                    <div>
                        <a href="<?php echo e(route('tours.create')); ?>" class="btn btn-primary mb-3">Thêm chuyến du lịch mới</a>

                    </div>

                </div>
                <div class="filter mt-2">
                    <form action="<?php echo e(route('tours.index')); ?>" method="get">
                        
                        <div class="row">
                            <div class="col-4 form-group">
                                <div class="d-inline-flex w-100">
                                    <div style="width: calc(150% ); margin-left: 15px">
                                        <input type="text" name="title" id="" placeholder="Tiêu đề"
                                            value="<?php echo e(request()->title); ?>" class="form-control mt-2">
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <div class="d-inline-flex w-100">
                                        <div style="width: calc(40%); margin-right: 15px">
                                            <select class="form-control mt-2" name="province">
                                                <option value="">Thành phố</option>
                                                <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($value->id); ?>"
                                                        <?php if(request()->province == $value->id): ?> selected <?php endif; ?>>
                                                        <?php echo e($value->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

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
                            </div>
                            <div class="col-md-3 form-group mt-2">
                                <div class="pull-right " style="margin-bottom: 15px">
                                    <a href="<?php echo e(route('tours.index')); ?>" class="btn btn-primary">
                                        Bỏ lọc
                                    </a>
                                    <button type="submit" class="btn btn-info">Lọc</button>
                                </div>
                            </div>


                        </div>
                    </form>
                </div>
                <div class="card-body table-rep-plugin">
                    <div class="table table-bordered table-responsive card" data-pattern="priority-columns">
                        <table id="admintable" class="table table-striped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="width: 20%">Tiêu đề</th>
                                    <th>Số ngày</th>
                                    <th>Giá </th>
                                    <th>Giá khuyến mại</th>
                                    <th>Thành phố</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($tours) > 0): ?>
                                    <?php $__currentLoopData = $tours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $tour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($index + 1); ?></td>
                                            <td style="max-height: 100px; overflow: hidden;width: 20%">
                                                <?php echo nl2br(wordwrap($tour->title, 70, "\n", true)); ?>

                                            </td>
                                            <td><?php echo e($tour->day); ?></td>
                                            <td><?php echo e(number_format($tour->price, 0, '.', '.')); ?> VND</td>
                                            <td><?php echo e(number_format($tour->promotion, 0, '.', '.')); ?> VND</td>
                                            <td><?php echo e($tour->provinces->name); ?></td>

                                            <td>
                                                <?php
                                                    echo $tour->is_active == 1
                                                        ? '<span class="badge bg-success-subtle text-success text-uppercase">Kích hoạt</span>'
                                                        : '<span class="badge bg-success-subtle text-danger text-uppercase">Khóa</span>';
                                                ?>
                                            </td>
                                            <td>
                                                <button class="btn"><a class=""
                                                        href="<?php echo e(route('tours.show', ['tour' => $tour->id])); ?>"
                                                        data-target="dropdownMenu<?php echo e($tour->id); ?>"> <i
                                                            class="ri-eye-fill fs-5"></i></a>
                                                </button>

                                                <form action="<?php echo e(route('tours.destroy', $tour->id)); ?>" method="POST"
                                                    style="display: inline-block;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn border-0 border-spacing-0 p-0"
                                                        onclick="return confirm('Bạn có chăc chắn muốn xóa chuyến du lịch này?')">
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
                        <?php echo e($tours->links()); ?>


                    </div>


                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DATN\resources\views/admin/tours/index.blade.php ENDPATH**/ ?>