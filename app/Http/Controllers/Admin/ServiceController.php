<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    // সব সার্ভিস দেখাবে
    public function index()
    {
        $services = Service::with('category')
            ->orderByDesc('id')
            ->get();

        return view('admin.services.index', compact('services'));
    }

    // নতুন সার্ভিস যোগ করার ফর্ম
    public function create()
    {
        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('admin.services.create', compact('categories'));
    }

    // নতুন সার্ভিস ডাটাবেজে সেভ করবে
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => [
                'required',
                'integer',
                Rule::exists('categories', 'id')->where('is_active', true),
            ],
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price_type' => 'required|in:fixed,quote',
            'price' => 'nullable|numeric|min:0|required_if:price_type,fixed',
            'is_active' => 'required|boolean',
        ]);

        $validated['slug'] = Str::slug(
            $validated['slug'] ?: $validated['name']
        );

        if (Service::where('slug', $validated['slug'])->exists()) {
            return back()
                ->withInput()
                ->withErrors([
                    'slug' => 'এই Slug আগে থেকেই আছে। অন্য Slug ব্যবহার করুন।'
                ]);
        }

        if ($validated['price_type'] === 'quote') {
            $validated['price'] = null;
        }

        Service::create($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'নতুন সার্ভিস সফলভাবে যোগ হয়েছে!');
    }

    // একটি সার্ভিসের বিস্তারিত
    public function show(Service $service)
    {
        $service->load('category');

        return view('admin.services.show', compact('service'));
    }

    // সার্ভিস সম্পাদনার ফর্ম
    public function edit(Service $service)
    {
        $categories = Category::where('is_active', true)
            ->orWhere('id', $service->category_id)
            ->orderBy('name')
            ->get();

        return view(
            'admin.services.edit',
            compact('service', 'categories')
        );
    }

    // সার্ভিস আপডেট
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'category_id' => [
                'required',
                'integer',
                Rule::exists('categories', 'id')->where('is_active', true),
            ],
            'name' => 'required|string|max:255',
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('services', 'slug')->ignore($service->id),
            ],
            'description' => 'nullable|string',
            'price_type' => 'required|in:fixed,quote',
            'price' => 'nullable|numeric|min:0|required_if:price_type,fixed',
            'is_active' => 'required|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['slug']);

        if (Service::where('slug', $validated['slug'])
            ->where('id', '!=', $service->id)
            ->exists()) {
            return back()
                ->withInput()
                ->withErrors([
                    'slug' => 'এই Slug আগে থেকেই আছে। অন্য Slug ব্যবহার করুন।'
                ]);
        }

        if ($validated['price_type'] === 'quote') {
            $validated['price'] = null;
        }

        $service->update($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'সার্ভিস সফলভাবে আপডেট হয়েছে!');
    }

    // সার্ভিস ডিলিট
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'সার্ভিস সফলভাবে ডিলিট হয়েছে!');
    }
}