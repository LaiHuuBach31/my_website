@extends('layouts.master')
@section('main')

<div class="bg-primary" style="margin-top: 100px;">
    <div class="container d-flex align-items-center text-light">
        <div class="page py-2 text-center">
            <a href="{{route('index.home')}}">Home</a>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right mx-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M5 12l14 0"></path>
                <path d="M15 16l4 -4"></path>
                <path d="M15 8l4 4"></path>
            </svg>
            <strong style="border-bottom: 1px solid #fff;">Your Cart</strong>
        </div>
    </div>
    <div>
        <img src="https://thumbs.dreamstime.com/b/empty-shopping-cart-inscription-green-wooden-background-web-banner-wood-word-trolley-one-side-concept-online-178287757.jpg" height="300px" width="100%" alt="">
    </div>
</div>
<div class="container">


    <div>
        @if($check == 0)
        <div class="cart_empty text-center" style="padding: 20px 0px;">
            <h3>Your cart is currently empty.</h3>
            <p class="text-secondary">
                Before proceed to checkout you must add some products to your shopping cart.
                You will find a lot of interesting products on our "Shop" page.
            </p>
            <a href="{{route('index.shop')}}" >Return to shop</a>
        </div>
        @else

        <div class="list_cart_1024">
            <div class="list-cart-top mt-5">
                <div class="container container_custom ">
                    <div class="row d-flex justify-content-between ">
                        <div class="row title_top col-lg-12 col-md-12 col-sm-6">
                            <div class="col-lg-1 col-md-1 col-sm-12 title_cart">
                                <h4>STT</h4>
                            </div>
                            <div class="col-lg-5 col-md-4 col-sm-12 title_cart">
                                <h4>PRODUCT NAME</h4>
                            </div>
                            <div class="col-lg-6 col-md-7 col-sm-12 row title_cart title_top_576">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <h4>PRICE</h4>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12">
                                    <h4>QUANTITY</h4>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <h4>TOTAL</h4>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-12">
                                    <h4></h4>
                                </div>
                            </div>
                        </div>
                        
                        @foreach($carts as $key => $item)
                       
                        <div class="row title_tops list_products col-lg-12 col-md-12 col-sm-6">
                            <div class="col-lg-1 d-flex align-items-center col-md-1 col-sm-12 content_cart">
                                <h5 class="id_cart">{{$key + 1}}</h5>
                            </div>
                            <div class="col-lg-5 d-flex align-items-center content_cart product_name_content col-md-4 col-sm-12">
                                <img src="{{url('uploads')}}/{{$item->cart->image}}" alt="" width="100px" height="100px">
                                <h5 class="mx-3"><strong>{{$item->cart->name}}</strong></h5>
                                <form action="{{route('cart.update_attribute', $item->id)}}" method="post">
                                    @csrf
                                    <div class="d-flex">
                                        <div class="">
                                            <select class="form-select form-select-lg" name="attr_id[]" style="padding-top: 0; padding-bottom: 0; font-size: 18px;">
                                                @foreach($item->cart->pro_attr as $size)
                                                @if($size->name == 'size')
                                                <option value="{{$size->id}}" {{$item->cart_attr->contains('id', $size->id) ? 'selected' : ''}}>
                                                    {{$size->value}}
                                                </option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="">
                                            <select class="form-select form-select-lg" name="attr_id[]" style="padding-top: 0; padding-bottom: 0; font-size: 18px;">
                                                @foreach($item->cart->pro_attr as $color)
                                                @if($color->name == 'color')
                                                <option value="{{$color->id}}" {{$item->cart_attr->contains('id', $color->id) ? 'selected' : ''}}>
                                                    {{$color->description}}
                                                </option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="text-light" style="background-color: green; border: 1px solid gray;">
                                            <i class="fa fa-edit" aria-hidden="true" style="font-size: 15px;"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 col-md-7 col-sm-12 row align-items-center ">
                                <div class="col-lg-3 col-md-3 content_cart col-sm-12">

                                    <strong>$ {{$item->cart->price}}</strong>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12">
                                    <form action="{{route('cart.update_quantity', $item->id)}}" method="post" id="form{{$item->id}}">
                                        @csrf
                                        <div class="input ml-3">
                                            <button type="button" class="btn-fake btn left_ip" onclick="mark_cart('-', {{$item->id}})"><i class="fa-solid fa-minus"></i></button>
                                            <input type="text" name="quantity_cart" value="{{$item->quantity}}" id="quantity{{$item->id}}" onblur="quantityCart({{$item->id}})">
                                            <button type="button" class="btn-fake btn right_ip" onclick="mark_cart('+', {{$item->id}})"><i class="fa-solid fa-plus"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-3 col-md-3 content_cart col-sm-12">
                                    <h5><strong>$ {{$item->total_price}}</strong></h5>
                                </div>
                                <div class="col-lg-1 col-md-1 content_cart col-sm-12">
                                    <a href="{{route('cart.delete', $item->id)}}" onclick="return confirm('are you ok ?')" style="color: #111;"><i class="fa-solid fa-xmark"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @if($check != 0)
                        <div class="pt-5 text-right">
                            <h5 class="text-danger"><strong>Total Price : $ {{$subTotal}}</strong></h5>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="container updateCart mt-5 mb-5 container_custom">
            <div class="proceed">
                <a href="{{route('cart.checkout')}}">PROCEED TO CHECKOUT</a>
            </div>
            <div class="continues">
                <a href="{{route('index.shop')}}">CONTINUE SHOPPING</a>
            </div>
        </div>
        @endif

        <!-- list_cart_768 -->

        <div class="list_cart_768">
            @if($check == 0)
            <div class="cart_empty text-center" style="padding: 20px 0px;">
                <h3>Your cart is currently empty.</h3>
                <p class="text-secondary">
                    Before proceed to checkout you must add some products to your shopping cart.
                    You will find a lot of interesting products on our "Shop" page.
                </p>
            </div>
            @else
            @foreach($carts as $key => $item)
            <div class="list_cart_768 container_custom mt-5">
                <div class="list_cart">
                    <div class="row d-flex align-items-center item_title">
                        <div class="col-sm-6 col-4">
                            <h5>STT</h5>
                        </div>
                        <div class="col-sm-6 col-8 text-center">
                            <span>{{$key + 1}}</span>
                        </div>
                    </div>
                    <div class="row mt-4 d-flex align-items-center item_title">
                        <div class="col-sm-6 col-4">
                            <h5>PRODUCT NAME</h5>
                        </div>
                        <div class="col-sm-6 col-8 d-flex align-items-center justify-content-center">
                            <span>{{$item->cart->name}}</span>
                        </div>
                    </div>
                    <div class="row mt-4 d-flex align-items-center item_title">
                        <div class="col-sm-6 col-4">
                            <h5>PRODUCT IMAGE</h5>
                        </div>
                        <div class="col-sm-6 col-8 d-flex align-items-center justify-content-center">
                            <img src="{{url('uploads')}}/{{$item->cart->image}}" alt="" width="80px" height="80px">
                        </div>
                    </div>
                    <form action="{{route('cart.update_attribute', $item->id)}}" method="post">
                        @csrf
                        <div class="row mt-4 d-flex align-items-center item_title">
                            <div class="col-sm-6 col-4">
                                <h5>SIZE</h5>
                            </div>
                            <div class="col-sm-6 col-8 d-flex align-items-center justify-content-center">
                                <select class="form-select form-select-lg" name="attr_id[]" style="padding-top: 0; padding-bottom: 0; font-size: 18px; width: 50%;">
                                    @foreach($item->cart->pro_attr as $size)
                                    @if($size->name == 'size')
                                    <option value="{{$size->id}}" {{$item->cart_attr->contains('id', $size->id) ? 'selected' : ''}}>
                                        {{$size->value}}
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4 d-flex align-items-center item_title">
                            <div class="col-sm-6 col-4">
                                <h5>COLOR</h5>
                            </div>
                            <div class="col-sm-6 col-8 d-flex align-items-center justify-content-center">
                                <select class="form-select form-select-lg" name="attr_id[]" style="padding-top: 0; padding-bottom: 0; font-size: 18px;  width: 50%;">
                                    @foreach($item->cart->pro_attr as $color)
                                    @if($color->name == 'color')
                                    <option value="{{$color->id}}" {{$item->cart_attr->contains('id', $color->id) ? 'selected' : ''}}>
                                        {{$color->value}}
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4 d-flex align-items-center item_title">
                            <div class="col-sm-6 col-4">
                                <h5></h5>
                            </div>
                            <div class="col-sm-6 col-8 d-flex align-items-center justify-content-center">
                                <button type="submit" class="text-light" style="background-color: green; border: 1px solid gray;">
                                    <i class="fa fa-upload" aria-hidden="true" style="font-size: 15px;"></i>
                                </button>
                            </div>
                        </div>

                    </form>

                    <div class="row mt-4 d-flex align-items-center item_title">
                        <div class="col-sm-6 col-4">
                            <h5>PRICE</h5>
                        </div>
                        <div class="col-sm-6 col-8 text-center">
                            <span>$ {{$item->cart->price}}</span>
                        </div>
                    </div>
                    <div class="row mt-4 d-flex align-items-center item_title">
                        <div class="col-sm-6 col-4">
                            <h5>QUANTITY</h5>
                        </div>
                        <div class="col-sm-6 col-8 text-center">
                            <form action="{{route('cart.update_quantity', $item->id)}}" method="post" id="form{{$item->id}}"> 
                                @csrf
                                <div class="input ml-3">
                                    <button type="button" class="btn-fake btn left_ip" onclick="mark_cart_768('-', {{$item->id}})"><i class="fa-solid fa-minus"></i></button>
                                    <input type="text" name="quantity_cart" value="{{$item->quantity}}" id="quantity{{$item->id}}" onblur="quantityCart({{$item->id}})">
                                    <button type="button" class="btn-fake btn right_ip" onclick="mark_cart_768('+', {{$item->id}})"><i class="fa-solid fa-plus"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-4 d-flex align-items-center item_title">
                        <div class="col-sm-6 col-4">
                            <h5>TOTAL</h5>
                        </div>
                        <div class="col-sm-6 col-8 text-center">
                            <span>$ {{$item->total_price}}</span>
                        </div>
                    </div>
                    <div class="remove mt-4">
                        <a href="{{route('cart.delete', $item->id)}}" onclick="return confirm('are you ok ?')" style="color: #111;"><i class="fa-solid fa-xmark"></i></a>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="container updateCart mt-5 mb-5 container_custom">
                <div class="proceed">
                    <a href="{{route('cart.checkout')}}">PROCEED TO CHECKOUT</a>
                </div>
                <div class="continues">
                    <a href="{{route('index.shop')}}">CONTINUE SHOPPING</a>
                </div>
            </div>

            @endif
        </div>
    </div>

    <!-- <div class="cart_empty text-center">
        <h3>Your cart is currently empty.</h3>
        <p class="text-secondary">
            Before proceed to checkout you must add some products to your shopping cart.
            You will find a lot of interesting products on our "Shop" page.
        </p>
        <a href="">Return to shop</a>
    </div> -->
</div>
@stop()