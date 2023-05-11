<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name',	'price', 'discount', 'image', 'category_id', 'user_id', 'status', 'description'];

    public function cate()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function attr()
    {
        return $this->hasMany(ProAttr::class, 'pro_id', 'id');
    }

    public function pro_attr()
    {
        return $this->belongsToMany(Attribute::class, 'pro_attrs', 'pro_id', 'attr_id');
    }

    public function image_view()
    {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }
}
