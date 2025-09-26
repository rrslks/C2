<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Brand;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        $categories = Category::all()->sortBy('name');
        return view('pages.categories', compact('categories', 'brands'));
    }
}
