<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartAttr extends Model
{
    use HasFactory;

    protected $fillable = ['cart_id', 'attr_id'];

}
