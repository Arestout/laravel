<?php

namespace App\Models;

class Categories
{
    private static $categories = [
        [
            'id' => 1,
            'title' => 'Спорт',
            'slug' => 'sport'
        ],
        [
            'id' => 2,
            'title' => 'Культура',
            'slug' => 'culture'
        ]
    ];

    public static function getCategories()
    {
        return static::$categories;
    }

    public static function getCategoryById($id)
    {
        if (isset(static::$categories[$id - 1])) {
            $category = static::$categories[$id - 1];
            return $category;
        }
        return null;
    }
}
