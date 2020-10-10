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
        return view('news.categories')->with('categories', Category::all());
    }

    public function show($slug)
    {
        $category = Category::query()->where('slug', $slug)->first();
        $news = News::query()->where('category_id', $category->id)->paginate(5);

        // $category->news->get();
        return view('news.category', [
            'news' => $news,
            'category' => $category
        ]);
    }
}
