<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        $news = DB::table('news')->get();
        return view('news.index')->with('news', $news);
    }

    public function showNewsById($id)
    {
        // dump($id);
        $news = DB::table('news')->find($id);
        return view('news.one')->with('news', $news);
    }

    public function showCategories()
    {
        return view('news.categories')->with('categories', Category::getCategories());
    }

    public function showCategoryById($id)
    {
        return view('news.categoryOne')->with('categoryNews', News::getNewsByCategoryId($id));
    }
}
