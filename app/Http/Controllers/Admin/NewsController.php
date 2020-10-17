<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::paginate(5);

        return view('admin.index')->with('news', $news);
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('admin.index')->with('success', 'Новость успешно удалена');
    }

    public function edit(News $news)
    {
        return view('admin.publish', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, News $news)
    {
        $url = null;
        // dd($request->all());

        if ($request->file('image')) {
            $path = Storage::putFile('public', $request->file('image'));
            $url = Storage::url($path);
        }

        $this->validate($request, News::rules(), [], News::attributeNames());

        $news->fill($request->all());
        $news->image = $url;
        $news->isPrivate = isset($request->isPrivate) ? 1 : 0;
        $news->category_id = $request->category;
        $news->save();



        return redirect()->route('news.one', $news)->with('success', 'Новость изменена!');
    }

    public function publish(Request $request)
    {
        if ($request->isMethod('post')) {

            $url = null;

            if ($request->file('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
            }

            $this->validate($request, News::rules(), [], News::attributeNames());

            $news = new News();
            $news->image = $url;
            $news->fill($request->except('image'))->save();

            return redirect()->route('news.one', $news->id)->with('success', 'Новость добавлена!');
        }

        return view('admin.publish', [
            'categories' => Category::all(),
            'news' => new News()
        ]);
    }

    public function download(Request $request)
    {
        if ($request->isMethod('post')) {

            $id = $request->input('category');


            return response()->json(News::query()->where('category_id', $id)->get())
                ->header('Content-Disposition', 'attachment; filename = "news.json"')
                ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }

        return view('admin.download')->with('categories', Category::all());
    }
}
