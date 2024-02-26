<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public static function generateUniqueId()
    {
        $id = mt_rand(100000, 999999); // 一意のIDを生成

        // 生成したIDが既存の記事と重複しているか確認
        while (self::where('article_id', $id)->exists()) {
            $id = mt_rand(100000, 999999);
        }

        return $id;
    }
    protected $fillable = ['title','content','images_id','article_id'];
    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
