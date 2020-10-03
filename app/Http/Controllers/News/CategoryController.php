<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

        return view('news.categories')->with('categories', Category::getCategories());
    }

    public function show($slug)
    {
        return view('news.category', [
            'news' => News::getNewsByCategorySlug($slug),
            'category' => Category::getCategoryBySlug($slug)
        ]);
    }
}
