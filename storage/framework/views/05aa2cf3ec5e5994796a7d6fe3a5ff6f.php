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
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Quản lý chuyến du lịch</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('tours.index')); ?>">Tours</a></li>
                            <li class="breadcrumb-item active"><a
                                    href="<?php echo e(route('tours.show', ['tour' => $tour->id])); ?>">Show</a></li>
                        </ol>
                    </div>

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
                            Thuộc tính
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#hotels" role="tab" aria-selected="false">
                            Khách sạn
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#itineraries" role="tab"
                            aria-selected="false">
                            Lịch trình
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#comments" role="tab" aria-selected="true">
                            Bình luận
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#rates" role="tab" aria-selected="true">
                            Đánh giá
                        </a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content  text-muted">
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <div class="d-flex gap-3">
                            <h4 class="mt-2">Thông tin du lịch</h4>
                            <a type="button" class="btn btn-success" data-bs-toggle="modal" id="create-btn"
                                data-bs-target="#showModalTour">
                                Sửa</a>
                        </div>


                        <div class="row mt-3">
                            <div class="col-md-4">
                                <p>Tiêu đề: <strong><?php echo e($tour->title); ?></strong></p>
                            </div>
                            <div class="col-md-4 d-flex gap-5">
                                <p>Trạng thái: <strong> <?php
                                    echo $tour->is_active == 1
                                        ? '<span class="badge bg-success-subtle text-success text-uppercase">Kích hoạt</span>'
                                        : '<span class="badge bg-success-subtle text-danger text-uppercase">Khóa</span>';
                                ?></strong></p>
                                <span>
                                    <p>Số ngày: <strong><?php echo e($tour->day); ?> Ngày
                                            <?php echo e($tour->day - 1 >= 1 ? $tour->day - 1 . ' Đêm' : ''); ?> </strong></p>
                                </span>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Giá: <strong><?php echo e(number_format($tour->price, 0, '.', '.')); ?> VND</strong></p>
                                <p>Giá khuyến mại: <strong><?php echo e(number_format($tour->promotion, 0, '.', '.')); ?>

                                        VND</strong>
                                </p>
                                <p>Địa chỉ:
                                    <strong>
                                        <?php echo e($tour->wards->name . ', ' . $tour->districts->name . ', ' . $tour->provinces->name); ?>

                                    </strong>
                                </p>
                            </div>
                            <div class="col-md-8 ">
                                <div class="limited-text">
                                    Mô tả:
                                    <?php echo $tour->description; ?>

                                </div>

                                <button class="btn btn-outline-info button" onclick="toggleText()">Xem thêm</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane " id="product1" role="tabpanel">
                        <div class="d-flex justify-content-between my-2">
                            <h4>Ảnh chuyến du lịch</h4>
                            <a type="button" class="btn btn-success" data-bs-toggle="modal" id="create-btn-image"
                                data-bs-target="#showModalImage">
                                Thêm ảnh</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table ">
                                <thead class="table-light">

                                    <tr>
                                        <th scope="col" class="text-black">#</th>
                                        <th scope="col" class="text-black">Ảnh</th>
                                        <th scope="col" class="text-black">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(count($tour->images) > 0): ?>
                                        <?php $__currentLoopData = $tour->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="">
                                                <td class="text-black" scope="col"><?php echo e($index + 1); ?></td>

                                                <td class="text-black">
                                                    <img width="200px" height="200px"
                                                        src="<?php echo e(asset($image->image)); ?>" alt="">
                                                </td>
                                                <td class="text-black">
                                                    <form action="<?php echo e(route('delImage.destroy', $image->id)); ?>"
                                                        method="post">
                                                        <?php echo csrf_field(); ?>
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
                                <tfoot>

                                </tfoot>
                            </table>


                            <?php echo e($tour->images->links()); ?>


                        </div>

                    </div>
                    <div class="tab-pane" id="messages" role="tabpanel">
                        <h4>Thuộc tính của chuyến du lịch</h4>
                        <div class="row">
                            <div class="col-md-8 table-responsive">
                                <table class="table bg-white">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-black">#</th>
                                            <th scope="col" class="text-black">Thuộc tính</th>
                                            <th scope="col" class="text-black">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($tour->attributes) > 0): ?>
                                            <?php $__currentLoopData = $tour->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="">
                                                    <td class="text-black" scope="col"><?php echo e($index + 1); ?></td>

                                                    <td class="text-black">
                                                        <?php echo e($attribute->attribute); ?>

                                                    </td>
                                                    <td class="text-black">
                                                        <form action="<?php echo e(route('delAttribute.destroy')); ?>"
                                                            method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="text" hidden name="tour_id"
                                                                value="<?php echo e($tour->id); ?>">
                                                            <input type="text" hidden name="attribute_id"
                                                                value="<?php echo e($attribute->id); ?>">
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
                                <?php echo e($tour->attributes->links()); ?>

                            </div>
                            <div class="col-md-4">
                                <form class="tablelist-form" autocomplete="off" id="" method="post"
                                    action="<?php echo e(route('addAttributes.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-3" id="modal-id" style="display: none;">
                                        <label for="id-field" class="form-label">ID</label>
                                        <input type="text" id="id-field" name="tour_id" class="form-control"
                                            placeholder="ID" value="<?php echo e($tour->id); ?>" readonly />
                                    </div>
                                    <div>
                                        <label for="date-field" class="form-label">Thuộc tính
                                        </label>
                                        <select name="attributes[]" multiple="multiple"
                                            class="js-example-basic-multiple" id="" class="form-control">
                                            <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($attribute->id); ?>"><?php echo e($attribute->attribute); ?>

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
                    <div class="tab-pane" id="hotels" role="tabpanel">
                        <h4>Khách sạn của chuyến du lịch</h4>
                        <div class="row">
                            <div class="col-md-8 table-responsive">
                                <table class="table bg-white">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-black">#</th>
                                            <th scope="col" class="text-black">Tên</th>
                                            <th scope="col" class="text-black">Giá</th>
                                            <th scope="col" class="text-black">Địa chỉ</th>
                                            <th scope="col" class="text-black">Trạng thái</th>
                                            <th scope="col" class="text-black">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($tour->hotels) > 0): ?>
                                            <?php $__currentLoopData = $tour->hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="">
                                                    <td class="text-black" scope="col"><?php echo e($index + 1); ?></td>

                                                    <td class="text-black">
                                                        <?php echo e($hotel->name); ?>

                                                    </td>

                                                    <td class="text-black">
                                                        <?php echo e(number_format($hotel->promotion, 0, '.', '.')); ?> VND </td>
                                                    <td class="text-black"
                                                        style="max-height: 100px; overflow: hidden;width: 20%">
                                                        <?php echo nl2br(
                                                            wordwrap(
                                                                $hotel->address . ',' . $hotel->ward->name . ',' . $hotel->district->name . ',' . $hotel->province->name,
                                                                70,
                                                                "\n",
                                                                true,
                                                            ),
                                                        ); ?>


                                                    </td>
                                                    <td class="text-black">
                                                        <?php
                                                            echo $hotel->status == 1
                                                                ? '<span class="badge bg-success-subtle text-success text-uppercase">Còn phòng</span>'
                                                                : '<span class="badge bg-success-subtle text-danger text-uppercase">Hết phòng</span>';
                                                        ?> </td>
                                                    <td class="text-black">
                                                        <form action="<?php echo e(route('delHotel.destroy')); ?>"
                                                            method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="text" hidden name="tour_id"
                                                                value="<?php echo e($tour->id); ?>">
                                                            <input type="text" hidden name="hotel_id"
                                                                value="<?php echo e($hotel->id); ?>">
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
                                <?php echo e($tour->hotels->links()); ?>

                            </div>
                            <div class="col-md-4">
                                <form class="tablelist-form" autocomplete="off" id="" method="post"
                                    action="<?php echo e(route('addHotels.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-3" id="modal-id" style="display: none;">
                                        <label for="id-field" class="form-label">ID</label>
                                        <input type="text" id="id-field" name="tour_id" class="form-control"
                                            placeholder="ID" value="<?php echo e($tour->id); ?>" readonly />
                                    </div>
                                    <div>
                                        <label for="date-field" class="form-label">Hotels
                                        </label>
                                        <select name="hotels[]" multiple="multiple" class="js-example-basic-multiple"
                                            id="" class="form-control">
                                            <?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($hotel->id); ?>"><?php echo e($hotel->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-success">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="itineraries" role="tabpanel">
                        <h4>Lịch trình của chuyến du lịch</h4>
                        <div class="edit">
                            <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal"
                                data-bs-target="#showModal">Thêm</button>
                        </div>

                        <div class="table-responsive">
                            <table class="table bg-white">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-black">#</th>
                                        <th scope="col" class="text-black">Ngày</th>
                                        <th scope="col" class="text-black">Tiêu đề </th>
                                        <th scope="col" class="text-black">Lịch trình cụ thể</th>
                                        <th scope="col" class="text-black">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(count($tour->itineraries) > 0): ?>
                                        <?php $__currentLoopData = $tour->itineraries()->orderby('day')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $itinerary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="">
                                                <td class="text-black" scope="col"><?php echo e($index + 1); ?></td>

                                                <td class="text-black">
                                                    Ngày <?php echo e($itinerary->day); ?>

                                                </td>
                                                <td class="text-black">
                                                    <?php echo e($itinerary->title); ?>

                                                </td>
                                                <td class="text-black " style="max-width: 600px">
                                                    <?php echo $itinerary->itinerary; ?>

                                                </td>
                                                <td class="text-black d-flex gap-2">
                                                    <button class="border-0 bg-white edit-item-btn showEdit"
                                                        data-bs-toggle="modal" data-bs-target="#editItinerary"
                                                        data-edit-id="<?php echo e($itinerary->id); ?>"> <i
                                                            class="ri-pencil-fill fs-4 text-warning"></i>
                                                    </button>
                                                    <form action="<?php echo e(route('delItinerary.destroy', $itinerary->id)); ?>"
                                                        method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="tour_id"
                                                            value="<?php echo e($tour->id); ?>">
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
                        </div>

                    </div>
                    <div class="tab-pane" id="comments" role="tabpanel">
                        <h4>Bình luận</h4>
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table bg-white">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-black">#</th>
                                            <th scope="col" class="text-black">Nội dung</th>
                                            <th scope="col" class="text-black">Người đăng</th>
                                            <th scope="col" class="text-black">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($tour->comments) > 0): ?>
                                            <?php $__currentLoopData = $tour->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="">
                                                    <td class="text-black" scope="col"><?php echo e($index + 1); ?></td>

                                                    <td class="text-black">
                                                        <?php echo e($comment->comments); ?>

                                                    </td>
                                                    <td class="text-black">
                                                        <?php echo e($comment->user->name); ?>

                                                    </td>
                                                    <td class="text-black">
                                                        <form action="<?php echo e(route('delComment.destroy', $comment->id)); ?>"
                                                            method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="text" hidden name="tour_id"
                                                                value="<?php echo e($tour->id); ?>">
                                                            <input type="text" hidden name="comment_id"
                                                                value="<?php echo e($comment->id); ?>">
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
                                <?php echo e($tour->comments->links()); ?>

                            </div>

                        </div>

                    </div>
                    <div class="tab-pane" id="rates" role="tabpanel">
                        <h4>Đánh giá <i
                                class="ri-star-s-fill text-warning"></i><?php echo e(number_format($tour->rates()->avg('rate'), 1)); ?>(<?php echo e($tour->rates()->count('rate')); ?>)
                        </h4>
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table bg-white">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-black">#</th>
                                            <th scope="col" class="text-black">Đánh giá</th>
                                            <th scope="col" class="text-black">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($tour->rates) > 0): ?>
                                            <?php $__currentLoopData = $tour->rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="">
                                                    <td class="text-black" scope="col"><?php echo e($index + 1); ?></td>

                                                    <td class="text-black">
                                                        <?php echo e($rate->rate); ?> <i
                                                            class="ri-star-s-fill text-warning fs-3"></i>
                                                    </td>
                                                    <td class="text-black">
                                                        <form action="<?php echo e(route('delRate.destroy', $rate->id)); ?>"
                                                            method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="text" hidden name="tour_id"
                                                                value="<?php echo e($tour->id); ?>">
                                                            <input type="text" hidden name="rate_id"
                                                                value="<?php echo e($rate->id); ?>">
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
                                <?php echo e($tour->attributes->links()); ?>

                            </div>

                        </div>

                    </div>
                </div>
            </div><!-- end card-body -->

            
            <div class="modal fade modal-lg" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel">Thêm lịch trình</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                id="close-modal"></button>
                        </div>
                        <form class="tablelist-form" autocomplete="off" action="<?php echo e(route('addItinerary.store')); ?>"
                            method="post">
                            <?php echo csrf_field(); ?>
                            <div class="modal-body">
                                <div class="mb-3" id="modal-id" style="display: none;">
                                    <label for="id-field" class="form-label">ID</label>
                                    <input type="text" id="id-field" class="form-control" name="tour_id"
                                        value="<?php echo e($tour->id); ?>" placeholder="ID" readonly />
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Ngày
                                    </label>
                                    <input type="text" id="customer-field" class="form-control" name="day"
                                        placeholder="" />

                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Tiêu đề
                                    </label>
                                    <input type="text" class="form-control" name="title" placeholder="" />

                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Lịch trình cụ thể
                                    </label>
                                    <textarea name="itinerary" class="ckeditor-classic"></textarea>

                                </div>

                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light"
                                        data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Thêm
                                    </button>
                                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            
            <div class="modal fade modal-lg" id="showModalTour" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content modal-xl">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel">Sửa chuyến du lịch</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                id="close-modal"></button>
                        </div>
                        <form class="tablelist-form" autocomplete="off" id="editForm" method="post"
                            action="<?php echo e(route('tours.update', ['tour' => $tour->id])); ?>">
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
                                            Tiêu đề</label>
                                        <input type="text" id="customername-field" class="form-control"
                                            value="<?php echo e($tour->title); ?>" name="title" placeholder="Enter Name" />
                                        <?php $__errorArgs = ['title'];
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
                                            value="<?php echo e($tour->price); ?>" placeholder="" />
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
                                            value="<?php echo e($tour->promotion); ?>" placeholder="" />
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
                                            <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($province->id); ?>"
                                                    <?php if($tour->province_id == $province->id): ?> selected <?php endif; ?>>
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
                                        <label for="date-field" class="form-label">Quận/Huyện
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
                                    <div class="mb-3 col-md-6">
                                        <label for="date-field" class="form-label">Kiêu du lịch
                                        </label>
                                        <select name="type_id" id="" class="form-control">
                                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($type->id); ?>"
                                                    <?php if($tour->type_id == $type->id): ?> selected <?php endif; ?>>
                                                    <?php echo e($type->name_type); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="status-field" class="form-label">Trạng thái</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                id="flexSwitchCheckChecked" name="is_active" value="1"
                                                id="active" <?php if($tour->is_active == 1): ?> checked <?php endif; ?>>

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
                                                <textarea name="description" class="ckeditor-classic-1">
                                                <?php echo e($tour->description); ?>

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
                            enctype="multipart/form-data" action="<?php echo e(route('addImage.store')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="modal-body">
                                <div class="mb-3" id="modal-id" style="display: none;">
                                    <label for="id-field" class="form-label">ID</label>
                                    <input type="text" id="id-field" class="form-control" name="tour_id"
                                        placeholder="ID" value="<?php echo e($tour->id); ?>" readonly />
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="customername-field" class="form-label">
                                            Ảnh</label>
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
            

            <div class="modal fade" id="editItinerary" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
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
    </div>
    <!--end col-->

</div>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(url('assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js', [])); ?> "></script>
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
            $('.showEdit').click(function() {
                let id = $(this).attr('data-edit-id');
                $.ajax({
                    url: '/admin/get-itinerary/' + id,
                    type: 'GET',
                    success: function(data) {
                        let form = `
                    <form class="tablelist-form" autocomplete="off" action="<?php echo e(route('updateItinerary.update')); ?>" method="post" >
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="customername-field" class="form-label">Ngày
                                </label>
                                <input type="hidden" id="customername-field" class="form-control" name="id" value="${data[0].id}"
                                     >
                                <input type="text" id="customername-field" class="form-control" name="day" value="${data[0].day}"
                                     >
                                
                            </div>
                            <div class="mb-3">
                                <label for="customername-field" class="form-label">Tiêu đề
                                </label>
                               
                                <input type="text" id="customername-field" class="form-control" name="title" value="${data[0].title}"
                                     >
                                
                            </div>
                             <div class="mb-3">
                                <label for="customername-field" class="form-label">Lịch trình cụ thể
                                </label>
                                            <textarea name="itinerary" class="ckeditor-classic-3 form-control">
                                                ${data[0].itinerary}
                                            </textarea>
                                        </div>
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" id="add-btn">Update
                                    </button>
                            </div>
                        </div>
                    </form>`;
                        $('#formEdit').html(form);
                        ClassicEditor
                            .create(document.querySelector('.ckeditor-classic-3'))
                            .catch(error => {
                                console.error(error);
                            });
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });


            ClassicEditor
                .create(document.querySelector('.ckeditor-classic-1'))
                .catch(error => {
                    console.error(error);
                });
            upload();
            $("#preview-container").on("click", ".delete", function() {
                $(this).parent(".preview").remove();
                $('#fileUpload').val(''); // Clear input value if needed

            });
            $.ajax({
                url: '/get-districts/' + <?php echo e($tour->province_id); ?>,
                type: 'GET',
                success: function(data) {
                    $('#districts').empty();
                    $.each(data, function(key, value) {
                        if (value.id == <?php echo e($tour->district_id); ?>) {
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
                url: '/get-wards/' + <?php echo e($tour->district_id); ?>,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $.each(data, function(key, value) {
                        if (value.id == <?php echo e($tour->ward_id); ?>) {
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

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Desktop\laragon\www\DEAH-Booking\resources\views/admin/tours/show.blade.php ENDPATH**/ ?>