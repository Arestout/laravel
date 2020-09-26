<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Categories;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index')->with('news', News::getNews());
    }

    public function showNewsById($id)
    {
        // dump($id);
        return view('news.newsOne')->with('news', News::getNewsId($id));
    }

    public function showCategories()
    {
        return view('news.categories')->with('categories', Categories::getCategories());
    }

    public function showCategoryById($id)
    {
        return view('news.categoryOne')->with('categoryNews', News::getNewsByCategoryId($id));
    }
}
