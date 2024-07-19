<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StatusPayment;
use App\Enums\StatusTour;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Post;
use App\Models\Tour;
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
        // $totalInMonth = Booking::where('deleted_at', null)
        //     ->where('status_payment', StatusPayment::PAID)
        //     ->where('status_tour', StatusTour::DONE)
        //     ->whereRaw('MONTH(created_at) = ' . $nowMonth)
        //     ->whereRaw('YEAR(created_at) = ' . $nowYear)
        //     ->sum('total_price');
        // $totalInMonth = number_format($totalInMonth, 0, ',', '.');
        // $totalInYear = Booking::where('deleted_at', null)
        //     ->where('status_payment', StatusPayment::PAID)
        //     ->where('status_tour', StatusTour::DONE)
        //     ->whereRaw('YEAR(created_at) = ' . $nowYear)
        //     ->sum('total_price');
        // $totalInYear = number_format($totalInYear, 0, ',', '.');
        $countPosts = Post::where('is_active', 1)->count();
        $countPostsInMonth = Post::where('is_active', 1)
            ->whereRaw('MONTH(created_at) = ' . $nowMonth)
            ->whereRaw('YEAR(created_at) = ' . $nowYear)
            ->count();
        $countTours = Tour::where('is_active', 1)->count();
        $countToursInMonth = Tour::where('is_active', 1)
            ->whereRaw('MONTH(created_at) = ' . $nowMonth)
            ->whereRaw('YEAR(created_at) = ' . $nowYear)
            ->count();
        $countCustomers = User::where('is_active', 1)->where('role', 0)->count();
        $countBookings = Booking::where('deleted_at', null)->count();
        $countBookingsInMonth = Booking::where('deleted_at', null)
            ->whereRaw('MONTH(created_at) = ' . $nowMonth)
            ->whereRaw('YEAR(created_at) = ' . $nowYear)
            ->count();
        $countCustomersInMonth = User::where('is_active', 1)->where('role', 0)
            ->whereRaw('MONTH(created_at) = ' . $nowMonth)
            ->whereRaw('YEAR(created_at) = ' . $nowYear)

            ->count();
        $dataShow = [
            // 'totalInMonth' => $totalInMonth,
            // 'totalInYear' => $totalInYear,
            'countCustomers' => $countCustomers,
            'countBookings' => $countBookings,
            'countBookingsInMonth' => $countBookingsInMonth,
            'countCustomersInMonth' => $countCustomersInMonth,
            'countTours' => $countTours,
            'countToursInMonth' => $countToursInMonth,
            'countPosts' => $countPosts,
            'countPostsInMonth' => $countPostsInMonth,
        ];
        return view('admin.dashboard', compact('dataShow', 'title'));
    }
}
