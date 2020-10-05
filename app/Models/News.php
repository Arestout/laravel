<?php

namespace App\Models;

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

    public static function getNewsFromFile()
    {
        $newsJson = \File::get(storage_path() . '/news.json');
        $news = json_decode($newsJson, true);

        return $news;
    }

    public static function getNews()
    {
        return static::$news;
    }

    public static function getNewsId($id)
    {
        // \File::put(storage_path() . '/news.json', json_encode(static::$news, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        $news = static::getNewsFromFile();
        if (isset($news[$id])) {
            $news = $news[$id];
            return $news;
        }
        return [];
    }

    public static function getNewsByCategorySlug($slug)
    {
        $id = Category::getCategoryIdBySlug($slug);
        $newsFromFile = static::getNewsFromFile();
        $news = [];

        foreach ($newsFromFile as $item) {
            if ($item['category_id'] == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }

    public static function getNewsByCategoryId($id)
    {
        $newsFromFile = static::getNewsFromFile();
        $categoryNews = [];

        foreach ($newsFromFile as $news) {
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
