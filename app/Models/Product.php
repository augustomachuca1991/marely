<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Jetstream\HasProfilePhoto;

class Product extends Model
{
    use HasFactory;
    use HasProfilePhoto;

    protected $fillable = [
        'code',
        'name',
        'description',
        'stock',
        'list_price',
        'sale_price',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected function name():Attribute
    {
        return new Attribute(
            set: function($value){
                return strtolower($value);
            }
        );
    }

    protected function stock():Attribute
    {
        return new Attribute(
            set: function($value){
                return intval($value);
            }
        );
    }


    protected $appends = [
        'profile_photo_url',
    ];

    public function scopeSearchProduct($query, $text)
    {
        if (!empty($text)) {
            $query->where('name', 'like', "%{$text}%")
            ->orWhere('code', 'like', "%{$text}%")
            ->orWhere('list_price', 'like', "%{$text}%");
        }
    }

    public function scopeSearchCategory($query, $byCategory)
    {
        if (!empty($byCategory)) {
            $query->whereHas('category' , function($category) use ($byCategory){
                $category->where('id' , $byCategory);
            });
        }
    }
}
