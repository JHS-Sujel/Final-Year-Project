<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];


    public function getStatusClassAttribute()
    {
        $str = 'badge-primary';
        if ($this->status == 1) {
            $str = 'badge-warning';
        }
        if ($this->status == 2) {
            $str = 'badge-success';
        }
        if ($this->status == 3) {
            $str = 'badge-danger';
        }

        return $str;
    }

    public function getStatusTextAttribute()
    {
        $str = 'Pending';
        if ($this->status == 1) {
            $str = 'Received';
        }
        if ($this->status == 2) {
            $str = 'Delivered';
        }
        if ($this->status == 3) {
            $str = 'canceled';
        }

        return $str;
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
