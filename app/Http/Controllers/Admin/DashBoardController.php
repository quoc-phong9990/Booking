<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StatusPayment;
use App\Enums\StatusTour;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    //
    public function index()
    {
        $nowMonth = date("m");
        $nowYear = date("Y");
        $title = "Dashboard";
        $totalInMonth = Booking::where('deleted_at', null)
            ->where('status_payment', StatusPayment::PAID)
            ->where('status_tour', StatusTour::DONE)
            ->whereRaw('MONTH(created_at) = ' . $nowMonth)
            ->sum('total_price');
        $totalInMonth = number_format($totalInMonth, 0, ',', '.');
        $totalInYear = Booking::where('deleted_at', null)
            ->where('status_payment', StatusPayment::PAID)
            ->where('status_tour', StatusTour::DONE)
            ->whereRaw('YEAR(created_at) = ' . $nowYear)
            ->sum('total_price');
        $totalInYear = number_format($totalInYear, 0, ',', '.');
        $countCustomers = User::where('is_active',1)->where('role',0)->count();
        $countBookings = Booking::where('deleted_at',null)->count();
        return view('admin.dashboard', compact('countBookings','countCustomers','totalInMonth', 'totalInYear', 'title'));
    }
}
