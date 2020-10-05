<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function publish(Request $request)
    {
        if ($request->isMethod('post')) {

            $url = null;

            if ($request->file('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
            }

            $news =  [
                'title' => $request->title,
                // 'category' => $request->category,
                'text' => $request->text,
                'isPrivate' => $request->isPrivate ? true : false,
                'image' => $url
            ];

            $id = DB::table('news')->insertGetId($news);

            return redirect()->route('news.one', $id)->with('success', 'Новость добавлена!');
        }

        return view('admin.publish')->with('categories', Category::getCategories());
    }

    public function download(Request $request)
    {
        if ($request->isMethod('post')) {

            $id = $request->input('category');


            return response()->json(News::getNewsByCategoryId($id))
                ->header('Content-Disposition', 'attachment; filename = "news.json"')
                ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }

        return view('admin.download')->with('categories', Category::getCategories());
    }
}
