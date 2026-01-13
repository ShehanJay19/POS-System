<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'sku',
        'barcode',
        'name',
        'description',
        'price',
        'quantity',
        'category_id'
    ];
    protected $casts=[
        'price'=>'decimal:2',
        'quantity'=>'integer'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }

    /**
     * Find product by barcode
     */
    public static function findByBarcode($barcode)
    {
        return self::where('barcode', $barcode)->first();
    }
}
