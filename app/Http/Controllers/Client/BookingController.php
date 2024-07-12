<?php

namespace App\Http\Controllers\Client;

use App\Enums\StatusPayment;
use App\Enums\StatusTour;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseJson;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    protected $ResponseJson;
    public function __construct(ResponseJson $ResponseJson)
    {
        $this->ResponseJson = $ResponseJson;
    }
    public function showByUserId(Request $request)
    {
        $bookings = Booking::where('user_id', $request->id)->orderByDesc('created_at')->get();
        if ($bookings) {
            $status_payment = $request->status_payment;
            $status_tour = $request->status_tour;
            if ($status_payment) {
                $bookings = $bookings->where('status_payment', $status_payment);
            }
            if ($status_tour) {
                $bookings = $bookings->where('status_tour', $status_tour);
            }
            return $this->ResponseJson->responseSuccess($bookings);
        }
        return $this->ResponseJson->responseFailed('Không có dữ liệu');
    }
    public function showByBookingCode($code)
    {
        $bookings = Booking::where('booking_code', $code)->orderByDesc('created_at')->get();
        if ($bookings) {
            return $this->ResponseJson->responseSuccess($bookings);
        }
        return $this->ResponseJson->responseFailed('Không có dữ liệu');
    }
    public function cancelBooking(Request $request)
    {
        $booking = Booking::where('booking_code', $request->booking_code)->first();
        if ($booking) {
            if ($booking->status_payment != StatusPayment::PAID && $booking->status_tour != StatusTour::WAITING) {
                $booking->status_payment = StatusPayment::CANCEL;
                $booking->status_tour = StatusTour::CANCEL;
                $booking->save();
                return $this->ResponseJson->responseSuccess('Hủy thành công');
            }
            return $this->ResponseJson->responseFailed('Không thể hủy');

        }
        return $this->ResponseJson->responseFailed('Không có dữ liệu');
    }
    public function refund(Request $request)
    {

    }
}
