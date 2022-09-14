<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];


    protected function name():Attribute
    {
        return new Attribute(
            set: function($value){
                return strtolower($value);
            },
            get: function ($value) {
                return ucfirst($value);
            }
        );
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeSearchCategory($query, $text)
    {
        if (!empty($text)) {
            $query->where('name', 'like', "%{$text}%");
        }
    }
}
