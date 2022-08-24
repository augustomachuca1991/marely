<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Referral extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'supplier_id',
        'bonification',
    ];


    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }


    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity','unit_price');
    }
}