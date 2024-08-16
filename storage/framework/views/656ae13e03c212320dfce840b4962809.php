<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Quản lý khách sạn</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('hotels.index')); ?>">Hotels</a></li>
                            <li class="breadcrumb-item active"><a href="<?php echo e(route('hotels.index')); ?>">List</a></li>
                        </ol>
                    </div>

                </div>
            </div>
            <div class="col-md-12 card">
                <div class="card-header d-flex justify-content-between">
                    <strong class="card-header border-0 fs-5">Danh sách khách sạn</strong>
                    <div>
                        <a href="<?php echo e(route('hotels.create')); ?>" class="btn btn-primary mb-3">Thêm khách sạn mới</a>

                    </div>

                </div>
                <div class="filter mt-2">
                    <form action="<?php echo e(route('hotels.index')); ?>" method="get">
                        
                        <div class="row">
                            <div class="col-4 form-group">
                                <div class="d-inline-flex w-100">
                                    <div style="width: calc(100% -135px); margin-right: 15px">
                                        <input type="text" name="name" id="" placeholder="Tên khách sạn"
                                            value="<?php echo e(request()->name); ?>" class="form-control mt-2">
                                    </div>
                                    <div style="width: calc(40%); ">
                                        <select class="form-control mt-2" name="province">
                                            <option value="">Thành phố</option>
                                            <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($value->id); ?>"
                                                    <?php if(request()->province == $value->id): ?> selected <?php endif; ?>>
                                                    <?php echo e($value->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <div class="d-inline-flex w-100 ">

                                        <div style="width: calc(40%); margin-right:1rem;">

                                            <select class="form-control mt-2" name="status">
                                                <option value="" selected>Trạng thái phòng</option>
                                                <option <?php if(request()->status == 1): ?> selected <?php endif; ?> value="1">
                                                    Còn phòng</option>
                                                <option <?php if(isset(request()->status) && request()->status == 0): ?> selected <?php endif; ?> value="0">
                                                    Hết phòng</option>
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
                                    <a href="<?php echo e(route('hotels.index')); ?>" class="btn btn-primary">
                                        Bỏ lọc
                                    </a>
                                    <button type="submit" class="btn btn-info">Lọc</button>
                                </div>
                            </div>


                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive card">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên</th>
                                    <th>Giá</th>
                                    <th>Giá khuyến mại</th>
                                    <th>Thành phố</th>
                                    <th>Trạng thái phòng</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($hotels)>0): ?>
                                    <?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($index + 1); ?></td>
                                            <td style="max-height: 100px; overflow: hidden;width: 20%">
                                                <?php echo nl2br(wordwrap($hotel->name, 80, "\n", true)); ?>

                                            </td>
                                            <td><?php echo e(number_format($hotel->price, 0, '.', '.')); ?> VND</td>
                                            <td><?php echo e(number_format($hotel->promotion, 0, '.', '.')); ?> VND</td>
                                            <td><?php echo e($hotel->province->name); ?></td>

                                            <td>
                                                <?php
                                                    echo $hotel->status == 1
                                                        ? '<span class="badge bg-success-subtle text-success text-uppercase">Còn phòng</span>'
                                                        : '<span class="badge bg-success-subtle text-danger text-uppercase">Hết phòng</span>';
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $hotel->is_active == 1
                                                        ? '<span class="badge bg-success-subtle text-success text-uppercase">Kích hoạt</span>'
                                                        : '<span class="badge bg-success-subtle text-danger text-uppercase">Khóa</span>';
                                                ?>
                                            </td>
                                            <td class="d-flex gap-2">
                                                <button class="border-0 bg-white">
                                                    <a class=""
                                                        href="<?php echo e(route('hotels.show', ['hotel' => $hotel->id])); ?>"
                                                        data-target="dropdownMenu<?php echo e($hotel->id); ?>"><i
                                                            class="ri-eye-fill fs-5"></i></a>
                                                </button>


                                                <form action="<?php echo e(route('hotels.destroy', $hotel->id)); ?>" method="POST"
                                                    style="display: inline-block;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn border-0"
                                                        onclick="return confirm('Bạn có chăc chắn muốn xóa khách sạn này?')"><i
                                                            class="ri-delete-bin-7-fill fs-5 text-danger"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <td class="fw-bold">Không có dữ liệu</td>
                                <?php endif; ?>

                            </tbody>
                        </table>
                        <?php echo e($hotels->links()); ?>


                    </div>


                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Desktop\laragon\www\DEAH-Booking\resources\views/admin/Hotel/index.blade.php ENDPATH**/ ?>