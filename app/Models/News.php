<?php

namespace App\Models;

use Illuminate\Support\Str;

class News
{
    private static $news = [
        '1' => [
            'id' => 1,
            'title' => 'Новость 1',
            'text' => 'А у нас новость 1 и она очень хорошая!',
            'slug' => '',
            'category_id' => 1,
            'isPrivate' => false
        ],
        '2' => [
            'id' => 2,
            'title' => 'Новость 2',
            'text' => 'А тут плохие новости(((',
            'slug' => '',
            'category_id' => 2,
            'isPrivate' => false
        ]
    ];

    public static function getNews()
    {
        return static::$news;
    }

    public static function getNewsId($id)
    {
        if (isset(static::$news[$id])) {
            $news = static::$news[$id];
            return $news;
        }
        return [];
    }

    public static function getNewsByCategorySlug($slug)
    {
        $id = Category::getCategoryIdBySlug($slug);
        $news = [];
        foreach (static::$news as $item) {
            if ($item['category_id'] == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }

    public static function getNewsByCategoryId($id)
    {
        $categoryNews = [];

        foreach (static::$news as $news) {
            if ($news['category_id'] == $id) {
                array_push($categoryNews, $news);
            }
        }

        if (count($categoryNews) > 0) {
            return $categoryNews;
        }
        return [];
    }
}
