<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'user_id',
        'amount',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'details' , 'sale_id' ,'product_id')->withPivot('quantity','price_to_date');
    }

    public function scopeSearchSale($query, $text)
    {
        if (!empty($text)) {
            $query->whereHas('products' , function ($products) use ($text){
                $products->where('products.code', 'like', "%{$text}%" )
                ->orWhere('products.name', 'like', "%{$text}%")
                ->orWhere('products.description', 'like', "%{$text}%");
            });
        }
    }

    public function scopeSearchUser($query, $userId)
    {
        if (!empty($userId)) {
            $query->whereHas('user' , function ($user) use ($userId){
                $user->where('id', $userId );
            });
        }
    }

    public function scopeFromTo($query, $dateFrom, $dateTo)
    {
        if (!empty($dateFrom) && !empty($dateTo) ) {
            // $query->whereHas('user' , function ($user) use ($userId){
            //     $user->where('id', $userId );
            // });
        }
    }


}
