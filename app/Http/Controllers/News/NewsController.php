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
        // $news = News::all();
        // $news = News::query()->where('isPrivate', false)->get();
        $news = News::paginate(5);

        return view('news.index')->with('news', $news);
    }

    public function showNewsById(News $news)
    {
        // dump($id);
        // $news = DB::table('news')->find();
        return view('news.one')->with('news', $news);
    }

    public function showCategories()
    {
        return view('news.categories')->with('categories', Category::all());
    }
}
