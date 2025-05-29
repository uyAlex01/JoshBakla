<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   // app/Http/Controllers/CategoryController.php
public function index()
{
    $categories = Category::withCount('events')
                        ->orderBy('name')
                        ->get();
    
    return view('categories.index', compact('categories'));
}

public function show(Category $category)
{
    $events = $category->events()
                     ->upcoming()
                     ->paginate(12);
    
    return view('categories.show', compact('category', 'events'));
}

    
}