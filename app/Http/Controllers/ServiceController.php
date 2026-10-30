<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function show(Service $service)
    {
        $service->load('category');

        if (!$service->is_active || !$service->category || !$service->category->is_active) {
            abort(404);
        }

        return view('services.show', compact('service'));
    }
}
