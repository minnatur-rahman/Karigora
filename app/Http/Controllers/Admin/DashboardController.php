<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCategories = Category::count();

        $totalServices = Service::count();

        $totalBookings = Booking::count();

        $pendingBookings = Booking::where('status', 'pending')->count();

        $recentBookings = Booking::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalCategories',
            'totalServices',
            'totalBookings',
            'pendingBookings',
            'recentBookings'
        ));
    }
}