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
        'total_amount'
    ];


    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }


    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'unit_price');
    }

    public function scopeSearchSupplier($query, $text)
    {
        if (!empty($text)) {
            $query->whereHas('supplier', function ($supplier) use ($text) {
                $supplier->where('company_name', 'LIKE', "%{$text}%");
            });
        }
    }


    public function getTotalAmount()
    {
        $neto = 0;
        foreach ($this->products as $product) {
            $neto += $product->pivot->quantity * $product->pivot->unit_price;
        }
        $porcentaje  =  ($neto * $this->bonification) / 100;
        $total_amount = $neto - $porcentaje;
        return $total_amount;
    }
}
