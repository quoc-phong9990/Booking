<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container">
    <h2>Cảm ơn thượng đế <?php echo e($booking->user_name); ?> đã sử dụng dịch vụ của em.</h2>
    <div>
        <h4>Thông tin của thượng đế</h4>
        <div class="row">
            <div class="col-6">
                <p>Mã đặt: <strong><?php echo e($booking->booking_code); ?></strong></p>
                <p>Tên: <strong><?php echo e($booking->user_name); ?></strong></p>
                <p>Email: <strong><?php echo e($booking->email); ?></strong></p>
                <p>SĐT: <strong><?php echo e($booking->phone); ?></strong></p>
            </div>
            <div class="col-6">
                <p>Số người: <?php echo e($booking->people); ?></p>
                <p>Ngày bắt đầu: <?php echo e($booking->start); ?> <br>
                    Ngày kết thúc: <?php echo e($booking->end); ?></p>
                <p>Số tiền <?php echo e(number_format($booking->total_price, 0, '.', '.')); ?> VND</p>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p>Tour: <?php echo e($booking->tour_name); ?></p>
                <p>Giá tour: <?php echo e(number_format($booking->tour_price, 0, '.', '.')); ?> VND</p>
                <p>Địa chỉ tour: <?php echo e($booking->tour_address); ?></p>
            </div>
            <div class="col-6">
                <p>Khách sạn: <?php echo e($booking->hotel_name); ?></p>
                <p>Giá khách sạn: <?php echo e(number_format($booking->hotel_price, 0, '.', '.')); ?> VND</p>
                <p>Địa chỉ khách sạn: <?php echo e($booking->hotel_address); ?></p>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('admin.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\DATN\resources\views/mail/success.blade.php ENDPATH**/ ?>