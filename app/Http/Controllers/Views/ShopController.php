<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function shop()
    {
        $categories = Category::all();
        $sizes = Attribute::where('name', 'size')->get();
        $colors = Attribute::where('name', 'color')->get();

        $priceMin = Product::min('price');
        $priceMax = Product::max('price');

        $minPrice = request()->min_price;
        $maxPrice = request()->max_price;
        $keyword = request()->keyword;
        $idCate = request()->cate;
        $color = request()->color;
        $size = request()->size;
        $sort = request()->sort;

        // dd($sort );

        $products = Product::query();

        if ($minPrice && $maxPrice) {
            $products->whereBetween('price', [$minPrice, $maxPrice]);
        } else if ($minPrice) {
            $products->where('price', '>=', $minPrice);
        } else if ($maxPrice) {
            $products->where('price', '<=', $maxPrice);
        }

        if ($keyword) {
            $products->where('name', 'like', '%' . $keyword . '%');   
        }

        if ($idCate) {
            $products->where('category_id', $idCate);  
        }

        if ($color) {
            $products->whereHas('pro_attr', function ($query) use ($color) {
                $query->where('name', 'color')->where('attributes.id', $color);
            });
        }

        if ($size) {
            $products->whereHas('pro_attr', function ($query) use ($size) {
                $query->where('name', 'size')->where('attributes.id', $size);
            });
        }

        switch ($sort) {
            case 'latest':
                $products->orderBy('id', 'DESC');
                break;
            case 'low_to_high':
                $products->orderBy('price', 'ASC');
                break;
            case 'high_to_low':
                $products->orderBy('price', 'DESC');
                break;
            default:
                $products->orderBy('id', 'ASC');
                break;
        }

        $products = $products->paginate(8);
        
        $categories = Category::all();

        return view('customer.shop', compact('products', 'categories', 'sizes', 'colors', 'priceMin', 'priceMax'));

    }

    public function productDetail(Product $product)
    {
        $images = Image::where('product_id', $product->id)->get();
        $attributes = $product->pro_attr;
        return view('customer.detail', compact('product', 'images', 'attributes'));
    }

    public function catePro(Category $cate)
    {
        $categories = Category::all();
        $sizes = Attribute::where('name', 'size')->get();
        $colors = Attribute::where('name', 'color')->get();
        $products = Product::where('category_id', $cate->id)->paginate(8);

        return view('customer.cate_pro', compact('categories', 'sizes', 'colors', 'products'));
    }
}
