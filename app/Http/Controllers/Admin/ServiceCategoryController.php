<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::withCount('clinicServices')->ordered()->get();

        return view('admin.service-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.service-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateCategory($request);
        $validated['slug'] = Str::slug($validated['name'], '_');
        $validated['order'] = $validated['order'] ?? 0;

        ServiceCategory::create($validated);

        return redirect()->route('admin.service-categories.index')->with('success', 'Service category created successfully!');
    }

    public function edit(ServiceCategory $serviceCategory)
    {
        return view('admin.service-categories.edit', compact('serviceCategory'));
    }

    public function update(Request $request, ServiceCategory $serviceCategory)
    {
        $validated = $this->validateCategory($request, $serviceCategory);
        $validated['order'] = $validated['order'] ?? $serviceCategory->order ?? 0;

        $serviceCategory->update($validated);

        return redirect()->route('admin.service-categories.index')->with('success', 'Service category updated successfully!');
    }

    public function destroy(ServiceCategory $serviceCategory)
    {
        if ($serviceCategory->clinicServices()->exists()) {
            return redirect()->route('admin.service-categories.index')->with('error', 'Move or reassign every service in this category before deleting it.');
        }

        $serviceCategory->delete();

        return redirect()->route('admin.service-categories.index')->with('success', 'Service category deleted successfully!');
    }

    private function validateCategory(Request $request, ?ServiceCategory $category = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('service_categories', 'name')->ignore($category?->id)],
            'order' => 'nullable|integer|min:0',
        ]);
    }
}
