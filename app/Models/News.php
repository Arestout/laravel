<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Rules\Ember;

class News extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'text', 'isPrivate', 'image', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->get();
    }

    public static function rules()
    {
        $tableNameCategory = (new Category())->getTable();
        return [
            'title' => ['required', 'min:10', 'max:20'],
            'text' => 'required',
            'category' => "required|exists:{$tableNameCategory},id",
            'image' => 'mimes:jpeg,png,bmp|max:1000',
            'isPrivate' => 'boolean'
        ];
    }

    public static function attributeNames()
    {
        return [
            'title' => 'Заголовок новости',
            'text' => 'Текст новости',
            'category' => "Категория новости",
            'image' => "Изображение",
        ];
    }
}
