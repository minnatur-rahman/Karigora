@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4">Karigora Admin Dashboard</h2>

    <div class="row">

        <div class="col-md-3 mb-3">
            <div class="card bg-primary text-white p-3">
                <h5>Total Categories</h5>
                <h2>{{ $totalCategories }}</h2>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-success text-white p-3">
                <h5>Total Services</h5>
                <h2>{{ $totalServices }}</h2>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-info text-white p-3">
                <h5>Total Bookings</h5>
                <h2>{{ $totalBookings }}</h2>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-warning text-dark p-3">
                <h5>Pending Bookings</h5>
                <h2>{{ $pendingBookings }}</h2>
            </div>
        </div>

    </div>

    <hr>

    <h4>Recent Bookings</h4>

    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>ID</th>
                <th>Booking ID</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>
            @forelse($recentBookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->status }}</td>
                    <td>{{ $booking->created_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        No bookings found.
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>

    <hr>

    <h4>Manage Karigora</h4>

    <a href="{{ route('admin.categories.index') }}"
       class="btn btn-primary">
        Manage Categories
    </a>

    <a href="{{ route('admin.services.index') }}"
       class="btn btn-success">
        Manage Services
    </a>

    <a href="{{ route('admin.bookings.index') }}"
       class="btn btn-info">
        Manage Bookings
    </a>

</div>

@endsection