<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['cus_id','status', 'shipping_metod', 'payment_metod', 'order_note', 'token'];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'cus_id');
    }

    public function cart_order()
    {
        return $this->hasMany(OrderDetail::class, 'order_id' , 'id');
    }

    public function totalPrice()
    {
        $total = 0;
        foreach ($this->cart_order as $item) {
            $total += $item->price * $item->quantity;
        }
        return $total;
    }
}
