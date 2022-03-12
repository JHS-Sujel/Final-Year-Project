<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'quantity',
        'status'
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
