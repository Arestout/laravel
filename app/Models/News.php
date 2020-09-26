<?php

namespace App\Models;

use Illuminate\Support\Str;

class News
{
    private static $news = [
        [
            'id' => 1,
            'title' => 'Новость 1',
            'text' => 'А у нас новость 1 и она очень хорошая!',
            'slug' => '',
            'category_id' => 1,
        ],
        [
            'id' => 2,
            'title' => 'Новость 2',
            'text' => 'А тут плохие новости(((',
            'slug' => '',
            'category_id' => 2,
        ]
    ];

    public static function getNews()
    {
        return static::$news;
    }

    public static function getNewsId($id)
    {
        if (isset(static::$news[$id - 1])) {
            $news = static::$news[$id - 1];
            return $news;
        }
        return null;
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
        return null;
    }
}
