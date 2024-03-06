<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->paginate(5);
        return view('admin.categories.index', compact('categories'));
    }
    public function create()
    {
        $category = new Category();
        return view('admin.categories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {

        $incomingFields = $request->validated();
       


        $category = Category::create($incomingFields);

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $events = $category->events()->paginate(10);
        return view('admin.categories.show', compact('category', 'events'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(CategoryRequest $request, Category $category)
{
    $formFields = $request->validated();

    $category->fill($formFields)->save();

    return redirect()->route('categories.index')->with('success', 'Category updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');

    }
}
