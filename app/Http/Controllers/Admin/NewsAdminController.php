<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsAdminController extends Controller
{
    public function publish(Request $request)
    {
        if ($request->isMethod('post')) {
            $newsFromFile = News::getNewsFromFile();
            $news = (object) [
                'id' => count($newsFromFile) + 1,
                'title' => $request->post('title'),
                'text' => $request->post('text'),
                'category_id' => (int)$request->post('category'),
                'isPrivate' => $request->post('isPrivate') ? true : false
            ];
            array_push($newsFromFile, $news);

            \File::put(storage_path() . '/news.json', json_encode($newsFromFile, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            return redirect()->route('news.one', $news->{'id'});
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

    public function addNewsToFile(Request $request)
    {
        if ($request->isMethod('post')) {
            $newsFromFile = News::getNewsFromFile();
            $news = (object) [
                'id' => count($newsFromFile) + 1,
                'title' => $request->post('title'),
                'text' => $request->post('text'),
                'category_id' => $request->post('category'),
                'isPrivate' => $request->post('isPrivate')
            ];
            array_push($newsFromFile, $news);
            // \File::put(storage_path() . '/news.json', json_encode($newsFromFile, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            // $news['id'] = $request->post('id');
            // $news['title'] = $request->post('title');
            // $news['text'] = $request->post('text');
            // $news['category_id'] = $request->post('category');
            // $news['isPrivate'] = $request->post('isPrivate');
        }
    }
}
