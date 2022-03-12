<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'status',
    ];

    public function getBrandUrlAttribute()
    {
        return route('brands.profile', $this->slug);
    }

    protected $appends = [
        'brand_url'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
