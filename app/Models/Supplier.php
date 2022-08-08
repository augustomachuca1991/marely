<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Supplier extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'company_name',
        'location',
        'phone_number'
    ];


    protected function company_name(): Attribute
    {
        return new Attribute(
            set: function ($value) {
                return strtolower($value);
            }
        );
    }


    public function scopeSearch($query, $text)
    {
        if (!empty($text)) {
            $query->where('company_name', 'like', "%{$text}%")
            ->orWhere('location', 'like', "%{$text}%");
        }
    }
}
