<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(Service $service)
    {
        if (!$service->is_active ||
            !$service->category ||
            !$service->category->is_active) {
            abort(404);
        }

        return view('bookings.create', compact('service'));
    }

    public function store(Request $request, Service $service)
    {
        if (!$service->is_active ||
            !$service->category ||
            !$service->category->is_active) {
            abort(404);
        }

        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/^(\+?88)?01[3-9]\d{8}$/'],
            'address' => ['required', 'string', 'max:255'],
            'area' => ['required', 'string', 'max:255'],
            'booking_date' => [
                'required',
                'date',
                'after_or_equal:today',
            ],
            'booking_time' => ['required', 'date_format:H:i'],
            'problem_description' => ['nullable', 'string', 'max:2000'],
        ], [
            'customer_name.required' => 'আপনার নাম লিখুন।',
            'phone.required' => 'মোবাইল নম্বর লিখুন।',
            'phone.regex' => 'সঠিক বাংলাদেশি মোবাইল নম্বর লিখুন।',
            'address.required' => 'আপনার ঠিকানা লিখুন।',
            'area.required' => 'আপনার এলাকা লিখুন।',
            'booking_date.required' => 'সার্ভিস নেওয়ার তারিখ নির্বাচন করুন।',
            'booking_date.after_or_equal' => 'আজকের আগের তারিখ নির্বাচন করা যাবে না।',
            'booking_time.required' => 'সময় নির্বাচন করুন।',
        ]);

        $booking = Booking::create([
            ...$validated,
            'service_id' => $service->id,
            'price_type' => $service->price_type,
            'price' => $service->price_type === 'fixed'
                ? $service->price
                : null,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('bookings.success', $booking)
            ->with('success', 'আপনার বুকিংয়ের অনুরোধ সফলভাবে জমা হয়েছে।');
    }

    public function success(Booking $booking)
    {
        return view('bookings.success', compact('booking'));
    }
}
