<?php

namespace App\Http\Controllers\Admin;

use App\Models\PostCategories;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $viewData = [
            'title' => 'Startmin - Bootstrap Admin Theme - Post Categories',
            'title_page' => 'Post Categories',
        ];

        $categories = PostCategories::all();
        return view('admin.pages.categories.index', compact('viewData', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Nếu bạn không cần phương thức này, có thể xóa hoặc chuyển hướng đến index
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        $category = PostCategories::create($request->all());
        return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(PostCategories $postCategories): JsonResponse
    {
        return response()->json($postCategories);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostCategories $postCategories): JsonResponse
    {
        return response()->json($postCategories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        $category = PostCategories::findOrFail($id);
        $category->update($request->all());
        return response()->json(['success' => 'Category updated successfully.', 'category' => $category]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        $category = PostCategories::find($id);
        $category->delete(); 
        return response()->json(['success' => 'Category deleted successfully.']);
    }
}
