<?php

namespace App\Http\Controllers;

use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', true)
            ->with(['services' => function ($query) {
                $query->where('is_active', true)
                    ->orderBy('name');
            }])
            ->orderBy('id')
            ->get();

        return view('welcome', compact('categories'));
    }
}
