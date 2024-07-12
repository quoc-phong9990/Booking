<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StatusPayment;
use App\Enums\StatusTour;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::orderByDesc('created_at')->paginate(10);
        $title = 'Bookings';
        return view('admin.Bookings.index', compact('bookings', 'title'));
    }

    public function edit($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            return response()->json($booking);
        }
        return response()->json();
    }
    public function show($id)
    {
        $booking = Booking::find($id);
        $booking->statusPayment = $booking->getNameStatusPayment();
        $booking->statusTour = $booking->getNameStatusTour();
        $booking->total_price = number_format($booking->total_price, 0, '.', '.') . " VND";
        $booking->tour_price = number_format($booking->tour_price, 0, '.', '.') . " VND";
        $booking->hotel_price = number_format($booking->hotel_price, 0, '.', '.') . " VND";
        // dd($booking);
        if ($booking) {
            return response()->json($booking);
        }
        return response()->json();
    }

    public function update(Request $request)
    {
        $booking = Booking::find($request->id);
        // dd($request->all(),$booking);
        if ($booking) {
            if ($request->status_payment == StatusPayment::PENDING || $request->status_tour == StatusTour::WAITING) {
                return redirect()->route('bookings.index')->with('error', "Don't update status booking");

            }
            if ($request->status_payment == StatusPayment::CANCEL || $request->status_tour == StatusTour::CANCEL) {
                $booking->update([
                    'status_payment' => StatusPayment::CANCEL,
                    'status_tour' => StatusTour::CANCEL,
                ]);
                return redirect()->route('bookings.index')->with('success', 'Update status booking successfully');
            }
            $booking->update($request->all());
            return redirect()->route('bookings.index')->with('success', 'Update status booking successfully');



        }
        return redirect()->route('bookings.index')->with('error', "Booking not exist");

    }

    public function updatePaymentStatus(Request $request, $id, Booking $booking)
    {
        $booking->where('booking_code', $id)->update($request->all());
        return response()->json(array('success' => 'Booking updated successfully'));
    }


    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }

}
