<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'status',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
