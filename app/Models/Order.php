<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    function user()
    {
        return $this->belongsTo(User::class);
    }

    function deliveryArea()
    {
        return $this->belongsTo(DeliveryArea::class);
    }

    function userAddress()
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }

    function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
