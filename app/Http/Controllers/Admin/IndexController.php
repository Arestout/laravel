<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function publish()
    {
        return view('admin.publish')->with('categories', Category::getCategories());
    }

    public function test2()
    {
        return view('admin.test2');
    }
}
