<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Quản lý đơn hàng</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('bookings.index')); ?>">Bookings</a></li>
                        <li class="breadcrumb-item active"><a href="<?php echo e(route('bookings.index')); ?>">List</a></li>
                    </ol>
                </div>

            </div>
        </div>
        <div class="col-md-12 card">
            <div class="row">
                <strong class="card-header border-0 fs-5">Danh sách đơn hàng</strong>
                <div class="filter mt-2">
                    <form action="<?php echo e(route('bookings.index')); ?>" method="get">
                        <div class="row">
                            <div class="col-4 form-group">
                                <div class="d-inline-flex w-100">
                                    <div style="width: calc(100% - 135px); margin-left: 15px">
                                        <input type="text" name="code" id="" placeholder="Mã đơn hàng"
                                            value="<?php echo e(request()->code); ?>" class="form-control mt-2">
                                    </div>
                                    <div style="width: calc(100% - 135px); margin-left: 15px">
                                        <input type="text" name="user_name" id="" placeholder="Tên khách hàng"
                                            value="<?php echo e(request()->user_name); ?>" class="form-control mt-2">
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <div class="d-inline-flex w-100">
                                        <div style="width: calc(40%); margin-right: 15px">

                                            <select class="form-control mt-2" name="status_payment">
                                                <option value="" selected>Trạng thái thanh toán</option>
                                                <?php $__currentLoopData = \App\Enums\StatusPayment::getKeys(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($index); ?>" <?php if(request()->status_payment == $index && request()->status_payment !=null): ?>
                                                    selected <?php endif; ?>>
                                                    <?php echo \App\Enums\StatusPayment::getValueByKey($index); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <div style="width: calc(40%); margin-right: 15px">

                                            <select class="form-control mt-2" name="status_tour">
                                                <option value="" selected>Trạng thái đơn hàng</option>

                                                <?php $__currentLoopData = \App\Enums\StatusTour::getKeys(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($index); ?>" <?php if(request()->status_tour == $index && request()->status_tour !=null): ?>
                                                    selected <?php endif; ?>>
                                                    <?php echo \App\Enums\StatusTour::getValueByKey($index); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 form-group mt-2">
                                <div class="pull-right " style="margin-bottom: 15px">
                                    <a href="<?php echo e(route('bookings.index')); ?>" class="btn btn-primary">
                                        Bỏ lọc
                                    </a>
                                    <button type="submit" class="btn btn-info">Lọc</button>
                                </div>
                            </div>


                        </div>
                    </form>
                </div>

            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên KH</th>
                            
                            <th>Mã đơn</th>
                            <th>Tổng tiền</th>
                            <th>Số người</th>
                            <th>Ngày đặt</th>
                            <th>Trạng thái thanh toán</th>
                            <th>Trạng thái đơn hàng</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($bookings)>0): ?>
                        <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        

                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($booking->user_name); ?></td>
                            
                            <td><?php echo e($booking->booking_code); ?></td>
                            <td><?php echo e(number_format($booking->total_price, 0, '.', '.')); ?> VND</td>
                            <td>
                                <p><?php echo e($booking->adults); ?> Người lớn</p>
                                <p><?php echo e($booking->kids6To12); ?> Trẻ 6-12</p>
                                <p><?php echo e($booking->kids0To5); ?> Trẻ 0-5</p>
                            </td>
                            <td><?php echo e($booking->created_at->format('d-m-Y')); ?></td>
                            <td>
                                <?php echo $booking->getNameStatusPayment(); ?>


                            </td>
                            <td>
                                <?php echo $booking->getNameStatusTour(); ?>


                            </td>
                            <td class="d-flex justify-content-between">
                                <i class="ri-eye-fill fs-5 showDetail" data-bs-toggle="modal"
                                    data-bs-target="#showDetail" role="button" tabindex="0"
                                    data-detail-id="<?php echo e($booking->id); ?>"></i>
                                <?php if($booking->status_tour == \App\Enums\StatusTour::WAITING): ?>
                                <i class="ri-pencil-fill fs-5 text-warning showEdit" data-bs-toggle="modal"
                                    role="button" tabindex="0" data-bs-target="#showModal"
                                    data-edit-id="<?php echo e($booking->id); ?>"></i>
                                <?php endif; ?>



                                
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <td class="fw-bold">Không có dữ liệu</td>
                        <?php endif; ?>


                    </tbody>
                </table>
                <?php echo e($bookings->links()); ?>

            </div>
        </div>
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
<div class="modal fade modal-lg" id="showDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="view">

        </div>
    </div>
</div>
</div>
<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function() {
            $('.showEdit').click(function() {
                let id = $(this).attr('data-edit-id');
                $.ajax({
                    url: "/admin/bookings/" + id + "/edit",
                    type: "GET",
                    success: function(data) {
                        let form = `
                    <form class="tablelist-form" autocomplete="off" action="<?php echo e(route('bookings.update')); ?>" method="post" >
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('put'); ?>
                        <input type="hidden" name="id" value="${data.id}">
                        
                        <div class="modal-body">
                            <h5> Mã đơn hàng: ${data.booking_code}
                        </h5>
                            <div class="mb-3">
                                <label for="customername-field" class="form-label">Trạng thái thanh toán
                                </label>
                              <select name="status_payment" class="form-control">
                        <option value="0" ${data.status_payment ==0?'selected':'' }>Chưa thanh toán</option>
                        <option value="1" ${data.status_payment ==1?'selected':'' }>Đã thanh toán</option>
                        
                                </select>
                                
                                
                            </div>
                            <div class="mb-3">
                                <label for="customername-field" class="form-label">Trạng thái đơn hàng
                                </label>
                              <select name="status_tour" class="form-control">
                        <option value="0" ${data.status_tour ==0?'selected':'' }>Đơn mới</option>
                        <option value="1" ${data.status_tour ==1?'selected':'' }>Hoàn thành</option>
                        <option value="2" ${data.status_tour ==2?'selected':'' }>Hủy</option>

                                </select>
                                
                                
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
                    },
                    error: function() {
                        console.log('Error');
                    }
                })


            });
            $('.showDetail').click(function() {
                let id = $(this).attr('data-detail-id');
                $.ajax({
                    url: "/admin/bookings/show/" + id,
                    type: "GET",
                    success: function(data) {
                        let form = `
                         <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Mã đơn hàng: ${data.booking_code}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div class="modal-body ">

                    <div class="row">
                        <div class="col-12 row mb-3">
                            <div class="col-6">
                                <p>
                                    Tên khách hàng: <strong>${data.user_name}</strong>
                                </p>
                                <p>
                                    Email: <strong>${data.email}</strong>
                                </p>
                                <p>
                                    Số điẹn thoại: <strong>${data.phone}</strong>
                                </p>
                                <p>
                                    Số người: <strong>${data.people}</strong>
                                </p>
                               

                                <p>
                                    Tổng tiền: <strong>${data.total_price}</strong>
                                </p>
                            </div>
                            <div class="col-6">
                                <p>Trạng thái thanh toán: ${data.statusPayment}</p>
                                <p>Trạng thái đơn hàng: ${data.statusTour}</p>
                                 <div class="   gap-2">
                                    <p>
                                        Ngày bắt đầu: <strong>${data.start}</strong>
                                    </p>
                                    <p>
                                        Ngày kết thúc: <strong>${data.end}</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 row">

                            <div class="col-6">
                                <p for="customername-field" class="form-label">Chuyến du lịch: ${data.tour_name}
                                </p>
                                <p>
                                    Giá chuyến du lịch: ${data.tour_price}
                                </p>
                                <p>
                                    Địa chỉ chuyến du lịch: ${data.tour_address}
                                </p>
                            </div>
                            <div class="col-6">
                                <p for="customername-field" class="form-label">Tên khách sạn: ${data.hotel_name}
                                </p>
                                <p>
                                    Giá khách sạn: ${data.hotel_price}
                                </p>
                                <p>
                                    Địa chỉ khách sạn: ${data.hotel_address}
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                       
                    </div>
                </div>`
                        $('#view').html(form);
                    }
                });
            });
        });
</script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DATN\resources\views/admin/Bookings/index.blade.php ENDPATH**/ ?>