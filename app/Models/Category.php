<?php

namespace App\Models;

class Category
{
    private static $categories = [
        '1' =>  [
            'id' => 1,
            'title' => 'Спорт',
            'slug' => 'sport'
        ],
        '2' =>  [
            'id' => 2,
            'title' => 'Культура',
            'slug' => 'culture'
        ]
    ];

    public static function getCategoryBySlug($slug)
    {
        $id = Category::getCategoryIdBySlug($slug);
        $category = Category::getCategoryById($id);
        if ($category != []) {
            return $category['title'];
        }
        return [];
    }

    public static function getCategoryIdBySlug($slug)
    {
        foreach (static::$categories as $category) {
            $id = null;
            if ($category['slug'] == $slug) {
                $id = $category['id'];
                break;
            }
        }
        return $id;
    }

    public static function getCategories()
    {
        return static::$categories;
    }

    public static function getCategoryById($id)
    {
        if (isset(static::$categories[$id])) {
            $category = static::$categories[$id];
            return $category;
        }
        return [];
    }
}
