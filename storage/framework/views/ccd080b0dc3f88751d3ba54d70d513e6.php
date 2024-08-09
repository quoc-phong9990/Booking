<?php $__env->startSection('content'); ?>
<?php $__env->startSection('styles'); ?>
    <style>
        .limited-text {
            max-height: 100px;
            /* Độ cao tối đa ban đầu của vùng chứa */
            overflow: hidden;
            /* Ẩn nội dung vượt quá max-height */
        }

        .limited-text.expanded {
            max-height: none;
            /* Hiển thị toàn bộ nội dung khi mở rộng */
        }
    </style>
<?php $__env->stopSection(); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Quản lý khách sạn</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('hotels.index')); ?>">Hotels</a></li>
                        <li class="breadcrumb-item active"><a
                                href="<?php echo e(route('hotels.show', ['hotel' => $hotel->id])); ?>">Show</a></li>
                    </ol>
                </div>

            </div>
        </div>
        <div class="card container">
            <div class="card-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs mb-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab"
                            aria-selected="false">
                            Thông tin
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " data-bs-toggle="tab" href="#product1" role="tab" aria-selected="false">
                            Thư viện ảnh
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab" aria-selected="false">
                            Dịch vụ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab" aria-selected="true">
                            Bình luận
                        </a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content  text-muted">
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <div class="d-flex gap-3">
                            <h4 class="mt-2">Thông tin khách sạn</h4>
                            <a type="button" class="btn btn-success" data-bs-toggle="modal" id="create-btn"
                                data-bs-target="#showModal">
                                Sửa</a>
                        </div>


                        <div class="row mt-3">
                            <div class="col-md-4">
                                <p>Tên: <strong><?php echo e($hotel->name); ?></strong></p>
                            </div>
                            <div class="col-md-4">
                                <p>Trạng thái kích hoạt: <strong> <?php
                                    echo $hotel->is_active == 1
                                        ? '<span class="badge bg-success-subtle text-success text-uppercase">Active</span>'
                                        : '<span class="badge bg-success-subtle text-danger text-uppercase">Block</span>';
                                ?></strong></p>
                            </div>
                            <div class="col-md-4">
                                <p>Trạng thái phòng: <strong> <?php
                                    echo $hotel->status == 1
                                        ? '<span class="badge bg-success-subtle text-success text-uppercase">Available</span>'
                                        : '<span class="badge bg-success-subtle text-danger text-uppercase">Full</span>';
                                ?></strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Giá: <strong><?php echo e(number_format($hotel->price, 0, '.', '.')); ?> VND</strong></p>
                                <p>Giá khuyến mại: <strong><?php echo e(number_format($hotel->promotion, 0, '.', '.')); ?>

                                        VND</strong>
                                </p>
                                <p>Địa chỉ:
                                    <strong>
                                        <?php echo e($hotel->address . ', ' . $hotel->ward->name . ', ' . $hotel->district->name . ', ' . $hotel->province->name); ?>

                                    </strong>
                                </p>
                            </div>
                            <div class="col-md-8 ">
                                <div class="limited-text">
                                    Mô tả:
                                    <?php echo $hotel->description; ?>

                                    <?= $hotel->description ?>
                                </div>

                                <button class="btn btn-outline-info button" onclick="toggleText()">Xem thêm</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane " id="product1" role="tabpanel">
                        <div class="d-flex justify-content-between my-2">

                            <h4>Ảnh khách sạn</h4>
                            <a type="button" class="btn btn-success" data-bs-toggle="modal" id="create-btn-image"
                                data-bs-target="#showModalImage">
                                Thêm ảnh</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table  align-middle">
                                <thead class="table-light">

                                    <tr>
                                        <th scope="col" class="text-black">#</th>
                                        <th scope="col" class="text-black">Ảnh </th>
                                        <th scope="col" class="text-black">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(count($hotel->images)>0): ?>
                                        <?php $__currentLoopData = $hotel->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="">
                                                <td class="text-black" scope="col"><?php echo e($index + 1); ?></td>

                                                <td class="text-black">
                                                    <img width="200px" height="200px" src="<?php echo e(asset($image->image)); ?>"
                                                        alt="">
                                                </td>
                                                <td class="text-black">
                                                    <form
                                                        action="<?php echo e(route('hotel_images.destroy', ['hotel_image' => $image->id])); ?>"
                                                        method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('delete'); ?>
                                                        <button type="submit" class="border-0 bg-white "
                                                            onclick="return confirm('Bạn có chắc chắn muốn xóa ảnh này không?')">
                                                            <i class="ri-delete-bin-7-fill fs-4 text-danger"></i>
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


                            <?php echo e($hotel->images->links()); ?>


                        </div>

                    </div>
                    <div class="tab-pane" id="messages" role="tabpanel">

                        <h4>Dịch vụ của khách sạn</h4>
                        <div class="row">
                            <div class="col-md-8 table-responsive">
                                <table class="table bg-white">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-black">#</th>
                                            <th scope="col" class="text-black">Dịch vụ</th>
                                            <th scope="col" class="text-black">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($hotel->services)>0): ?>
                                            <?php $__currentLoopData = $hotel->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="">
                                                    <td class="text-black" scope="col"><?php echo e($index + 1); ?></td>

                                                    <td class="text-black">
                                                        <?php echo e($service->service); ?>

                                                    </td>
                                                    <td class="text-black">
                                                        <form
                                                            action="<?php echo e(route('hotel_services.destroy', ['hotel_service' => $service->id])); ?>"
                                                            method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('delete'); ?>
                                                            <input type="text" hidden name="hotel_id"
                                                                value="<?php echo e($hotel->id); ?>">
                                                            <input type="text" hidden name="service_id"
                                                                value="<?php echo e($service->id); ?>">
                                                            <button type="submit" class="border-0 bg-white "
                                                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                                <i class="ri-delete-bin-7-fill fs-4 text-danger"></i>
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
                                <?php echo e($hotel->services->links()); ?>

                            </div>
                            <div class="col-md-4">
                                <form class="tablelist-form" autocomplete="off" id="" method="post"
                                    action="<?php echo e(route('hotel_services.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-3" id="modal-id" style="display: none;">
                                        <label for="id-field" class="form-label">ID</label>
                                        <input type="text" id="id-field" name="hotel_id" class="form-control"
                                            placeholder="ID" value="<?php echo e($hotel->id); ?>" readonly />
                                    </div>
                                    <div>
                                        <label for="date-field" class="form-label">Dịch vụ
                                        </label>
                                        <select name="services[]" multiple="multiple"
                                            class="js-example-basic-multiple" id="" class="form-control">
                                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($service->id); ?>"><?php echo e($service->service); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-success">Thêm</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="settings" role="tabpanel">
                        <h4>Bình luận</h4>
                        <div class="table-responsive">
                            <table class="table bg-white">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-black">#</th>
                                        <th scope="col" class="text-black">Bình luận</th>
                                        <th scope="col" class="text-black">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(count($hotel->comments)>0): ?>
                                        <?php $__currentLoopData = $hotel->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="">
                                                <td class="text-black" scope="col"><?php echo e($index + 1); ?></td>

                                                <td class="text-black">
                                                    <?php echo e($comment->comments); ?>

                                                </td>
                                                <td class="text-black">
                                                    <form
                                                        action="<?php echo e(route('hotel_comments.destroy', ['hotel_comment' => $comment->id])); ?>"
                                                        method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('delete'); ?>
                                                        <button type="submit" class="border-0 bg-white "
                                                            onclick="return confirm('Are you sure?')">
                                                            <i class="ri-delete-bin-line fs-4 text-danger"></i>
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
                            <?php echo e($hotel->comments->links()); ?>

                        </div>
                    </div>
                </div>
            </div><!-- end card-body -->

            
            <div class="modal fade modal-lg" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content modal-xl">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel">Sửa khách sạn</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                id="close-modal"></button>
                        </div>
                        <form class="tablelist-form" autocomplete="off" id="editForm" method="post"
                            action="<?php echo e(route('hotels.update', ['hotel' => $hotel->id])); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="modal-body">
                                <div class="mb-3" id="modal-id" style="display: none;">
                                    <label for="id-field" class="form-label">ID</label>
                                    <input type="text" id="id-field" class="form-control" placeholder="ID"
                                        readonly />
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="customername-field" class="form-label">
                                            Tên</label>
                                        <input type="text" id="customername-field" class="form-control"
                                            value="<?php echo e($hotel->name); ?>" name="name" placeholder="Enter Name" />
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger fs-10"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="email-field" class="form-label">Giá</label>
                                        <input type="text" id="email-field" class="form-control" name="price"
                                            value="<?php echo e($hotel->price); ?>" placeholder="" />
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger fs-10"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="phone-field" class="form-label">Giá khuyến mại</label>
                                        <input type="text" id="phone-field" class="form-control" name="promotion"
                                            value="<?php echo e($hotel->promotion); ?>" placeholder="" />
                                        <?php $__errorArgs = ['promotion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger fs-10"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <label for="date-field" class="form-label">Tỉnh/Thành phố
                                        </label>
                                        <select name="province_id" id="provinces" class="form-control">
                                            <option value="">--Chọn--</option>
                                            <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($province->id); ?>"
                                                    <?php if($hotel->province_id == $province->id): ?> selected <?php endif; ?>>
                                                    <?php echo e($province->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['province_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger fs-10"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label for="date-field" class="form-label">Quận/Huện
                                        </label>
                                        <select name="district_id" id="districts" class="form-control">
                                            <option value="">--Chọn--</option>

                                        </select>
                                        <?php $__errorArgs = ['district_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger fs-10"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label for="date-field" class="form-label">Xã/Phường
                                        </label>
                                        <select name="ward_id" id="wards" class="form-control">
                                            <option value="">--Chọn--</option>

                                        </select>
                                        <?php $__errorArgs = ['ward_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger fs-10"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="status-field" class="form-label">Địa chỉ</label>
                                        <input type="text" id="phone-field" class="form-control" name="address"
                                            value="<?php echo e($hotel->address); ?>" placeholder="" />
                                        <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger fs-10"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="status-field" class="form-label">Trạng thái phòng</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                id="flexSwitchCheckChecked" name="status" value="1"
                                                id="status" <?php if($hotel->status == 1): ?> checked <?php endif; ?>>
                                            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger fs-10"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="status-field" class="form-label">Trạng thái kich hoạt</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                id="flexSwitchCheckChecked" name="is_active" value="1"
                                                id="active" <?php if($hotel->is_active == 1): ?> checked <?php endif; ?>>
                                            <?php $__errorArgs = ['is_active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger fs-10"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header align-items-center d-flex">
                                                <h4 class="card-title mb-0">Mô tả</h4>
                                            </div><!-- end card header -->

                                            <div class="card-body">
                                                <textarea name="description" class="ckeditor-classic">
                                                <?php echo e($hotel->description); ?>

                                            </textarea>
                                            </div><!-- end card-body -->
                                        </div><!-- end card -->
                                    </div>
                                    <!-- end col -->
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light"
                                        data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Cập nhật</button>
                                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            

            
            <div class="modal fade modal-lg" id="showModalImage" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content modal-xl">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel">Thêm ảnh</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                id="close-modal"></button>
                        </div>
                        <form class="tablelist-form" autocomplete="off" id="" method="post"
                            enctype="multipart/form-data" action="<?php echo e(route('hotel_images.store')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="modal-body">
                                <div class="mb-3" id="modal-id" style="display: none;">
                                    <label for="id-field" class="form-label">ID</label>
                                    <input type="text" id="id-field" class="form-control" name="hotel_id"
                                        placeholder="ID" value="<?php echo e($hotel->id); ?>" readonly />
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="customername-field" class="form-label">
                                            File</label>
                                        <input type="file" class="form-control" id="fileUpload" name="images[]"
                                            placeholder="Enter Name" multiple>
                                        <div id="preview-container" class="d-flex flex-wrap mt-3 gap-3"></div>
                                    </div>


                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light"
                                        data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Thêm</button>
                                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            


        </div>
        <!--end col-->

    </div>
    <?php $__env->startSection('scripts'); ?>
        <script>
            function toggleText() {
                var textContainer = document.querySelector('.limited-text');
                textContainer.classList.toggle('expanded');
                var buttonText = document.querySelector('.button');
                if (textContainer.classList.contains('expanded')) {
                    buttonText.textContent = 'Thu gọn';
                } else {
                    buttonText.textContent = 'Xem thêm';
                }
            }

            function upload() {
                $("#fileUpload").on("change", function() {
                    let files = $(this)[0].files;
                    $("#preview-container").empty();
                    if (files.length > 0) {
                        for (let i = 0; i < files.length; i++) {
                            let reader = new FileReader();
                            reader.onload = function(e) {
                                $("<div class='preview'><img class='' width='200px' height='200px' src='" +
                                    e.target
                                    .result +
                                    "'><i class='ri-delete-bin-3-line delete text-danger fs-2'></i></div>"
                                ).appendTo(
                                    "#preview-container");
                            };
                            reader.readAsDataURL(files[i]);
                        }
                    }
                });
            }
            $(document).ready(function() {
                upload();
                $("#preview-container").on("click", ".delete", function() {
                    $(this).parent(".preview").remove();
                    $('#fileUpload').val(''); // Clear input value if needed

                });
                $.ajax({
                    url: '/get-districts/' + <?php echo e($hotel->province_id); ?>,
                    type: 'GET',
                    success: function(data) {
                        $.each(data, function(key, value) {
                            if (value.id == <?php echo e($hotel->district_id); ?>) {
                                $('#districts').append('<option value="' + value.id +
                                    '" selected> ' + value.name + '</option>');
                            } else {
                                $('#districts').append('<option value="' + value.id +
                                    '"> ' + value.name + '</option>');

                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
                $.ajax({
                    url: '/get-wards/' + <?php echo e($hotel->district_id); ?>,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $.each(data, function(key, value) {
                            if (value.id == <?php echo e($hotel->ward_id); ?>) {

                                $('#wards').append('<option value="' + value.id +
                                    '" selected>' + value.name + '</option>');
                            } else {
                                $('#wards').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            }
                        });
                    }
                });
                $('#provinces').on('change', function() {
                    var provinceId = $('#provinces').val();
                    $.ajax({
                        url: '/get-districts/' + provinceId,
                        type: 'GET',
                        success: function(data) {
                            $('#districts').empty();
                            $.each(data, function(key, value) {
                                $('#districts').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
                });
                $('#districts').on('change', function() {
                    var districtId = $('#districts').val();

                    $.ajax({
                        url: '/get-wards/' + districtId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#wards').empty();
                            $.each(data, function(key, value) {
                                $('#wards').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });

                });
            });
        </script>
    <?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Desktop\laragon\www\DEAH-Booking\resources\views/admin/Hotel/show.blade.php ENDPATH**/ ?>