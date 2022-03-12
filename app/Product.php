<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'sub_title',
        'slug',
        'image',
        'product_type_id',
        'brand_id',
        'details',
        'price',
        'status',
    ];

    public function getImageMediumAttribute()
    {
        return "/storage/products/thumbnail/medium/$this->image";
    }
    public function getImageSmallAttribute()
    {
        return "/storage/products/thumbnail/small/$this->image";
    }
    public function getImageOriginalAttribute()
    {
        return "/storage/products/$this->image";
    }


    public function getProductImageAttribute()
    {
        return "/storage/products/$this->image";
    }

    public function getProductUrlAttribute()
    {
        return route('products.profile', $this->slug);
    }

    protected $appends = [
        'product_image',
        'product_url',
        'image_small',
        'image_medium',
        'image_original',
    ];


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function product_type()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function stock()
    {
        return $this->hasOne(Stock::class);
    }
}
