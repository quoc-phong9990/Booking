@include('admin.layout.header')
<div class="container">
    <strong>Cảm ơn {{ $booking->user_name }} đã sử dụng dịch vụ của chúng tôi.</strong>
    <div>
        <h4>Thông tin đơn hàng:</h4>
        <div class="row">
            <div class="col-6">
                <p>Mã đơn hàng: <strong>{{ $booking->booking_code }}</strong></p>
                <p>Tên: <strong>{{ $booking->user_name }}</strong></p>
                <p>Email: <strong>{{ $booking->email }}</strong></p>
                <p>SĐT: <strong>{{ $booking->phone }}</strong></p>
            </div>
            <div class="col-6">
                <p>Số người: {{ $booking->adults }} người lớn, {{ $booking->kids }} trẻ con,</p>
                <p>Ngày bắt đầu: {{ $booking->start }} <br>
                    Ngày kết thúc: {{ $booking->end }}</p>
                <p>Số tiền {{ number_format($booking->total_price, 0, '.', '.') }} VND</p>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p>Tour: {{ $booking->tour_name }}</p>
                <p>Giá tour: {{ number_format($booking->tour_price, 0, '.', '.') }} VND</p>
                <p>Địa chỉ tour: {{ $booking->tour_address }}</p>
            </div>
            <div class="col-6">
                <p>Khách sạn: {{ $booking->hotel_name }}</p>
                <p>Giá khách sạn: {{ number_format($booking->hotel_price, 0, '.', '.') }} VND</p>
                <p>Địa chỉ khách sạn: {{ $booking->hotel_address }}</p>
            </div>
        </div>
    </div>
    <div>
        <h3>Xin trân trọng cảm ơn!</h3>
        <p>DEAH</p>
    </div>
</div>
@include('admin.layout.footer')
