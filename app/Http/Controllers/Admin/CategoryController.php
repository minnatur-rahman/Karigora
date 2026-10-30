<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // সব ক্যাটাগরি দেখাবে
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();

        return view('admin.categories.index', compact('categories'));
    }

    // নতুন ক্যাটাগরি যোগ করার ফর্ম দেখাবে
    public function create()
    {
        return view('admin.categories.create');
    }

    // নতুন ক্যাটাগরি ডাটাবেজে সংরক্ষণ করবে
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:50',
            'is_active' => 'required|boolean',
        ]);

        $validated['slug'] = !empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['name']);

        // তৈরি হওয়া slug আগে থেকে আছে কি না যাচাই
        if (Category::where('slug', $validated['slug'])->exists()) {
            return back()
                ->withInput()
                ->withErrors(['slug' => 'এই স্লাগটি আগে থেকেই আছে। অন্য স্লাগ ব্যবহার করুন।']);
        }

        Category::create($validated);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'নতুন ক্যাটাগরি সফলভাবে যোগ হয়েছে!');
    }

    // একটি ক্যাটাগরির বিস্তারিত দেখাবে
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    // ক্যাটাগরি সম্পাদনার ফর্ম দেখাবে
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // ক্যাটাগরি আপডেট করবে
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:50',
            'is_active' => 'required|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['slug']);

        $category->update($validated);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'ক্যাটাগরি সফলভাবে আপডেট হয়েছে!');
    }

    // ক্যাটাগরি ডিলিট করবে
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'ক্যাটাগরি সফলভাবে মুছে ফেলা হয়েছে!');
    }
}