@extends('layouts.master')
@section('main')
<div class=" mb-5 bg-primary" style="margin-top: 100px;">
    <div class="container d-flex align-items-center text-light">
        <div class="page d-flex align-items-center py-2 text-center">
            <a href="{{route('index.home')}}">Home</a>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right mx-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M5 12l14 0"></path>
                <path d="M15 16l4 -4"></path>
                <path d="M15 8l4 4"></path>
            </svg>
            <div>
                <a href="{{route('cart.view')}}">Cart</a> / <strong style="border-bottom: 1px solid #fff;">Check
                    Out</strong>
            </div>
        </div>
    </div>
    <div>
        <img src="https://cdn.shopify.com/s/files/1/0090/9236/6436/articles/Shopify_One_Page_Checkout_for_better_conversion_rate_1200x630.png?v=1620276027" width="100%" height="300px" alt="">
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#checkout_one" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                        CheckOut
                    </button>
                </li>
                <!-- <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#checkout_two" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                        Payment
                    </button>
                </li> -->
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#checkout_three" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                        Review your order
                    </button>
                </li>
            </ul>
        </div>

        <div class="col-lg-8">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="checkout_one" role="tabpanel" aria-labelledby="pills-home-tab">
                    <form action="{{route('cart.checkout')}}" method="post">
                        @csrf
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="ip mb-3">
                                    <input type="text" class="form-control" name="name" value="{{$auth->name}}" placeholder="Your FullName">
                                    @error('name')
                                    <small style="font-weight: 700; color: red;">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">

                                <div class="mb-3 ip">
                                    <input type="text" name="phone" value="{{$auth->phone}}" class="form-control" placeholder="Your Phone Number">
                                    @error('phone')
                                    <small style="font-weight: 700; color: red;">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="ip mb-3">
                            <input type="text" class="form-control" name="email" value="{{$auth->email}}" placeholder="Your Email">
                            @error('email')
                            <small style="font-weight: 700; color: red;">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mb-3 ip">
                            <input type="text" name="address" value="{{$auth->address}}" class="form-control" placeholder="Your Address">
                            @error('address')
                            <small style="font-weight: 700; color: red;">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="ip mb-3">
                                    <select class="form-select form-select-lg" name="shipping_metod" style="font-weight:350; border: 1px solid #111; font-size: 17px; color:gray">
                                        <option selected value="">Shipping Method</option>
                                        <option value="1">Home Delivery</option>
                                        <option value="2">Shipping By Post</option>
                                        <option value="3">Express Delivery</option>
                                    </select>
                                    @error('shipping_metod')
                                    <small style="font-weight: 700; color: red;">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="ip mb-3">
                                    <select class="form-select form-select-lg" name="payment_metod" style="font-weight:350; border: 1px solid #111;font-size: 17px; color:gray">
                                        <option selected value="">Payment Method</option>
                                        <option value="1">Cash Payment</option>
                                        <option value="2">Credit Card Payment</option>
                                        <option value="3">E-Wallet Payment</option>
                                    </select>
                                    @error('payment_metod')
                                    <small style="font-weight: 700; color: red;">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label"></label>
                            <textarea class="form-control" name="order_note" rows="3" placeholder="Your Content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-dark" style="border-radius: 0; font-weight: 600;">Countinue</button>
                    </form>
                </div>
                <!-- <div class="tab-pane fade" id="checkout_two" role="tabpanel" aria-labelledby="pills-profile-tab">

                </div> -->
                <div class="tab-pane fade" id="checkout_three" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <div class="list_cart_1024">
                        <div class="list-cart-top mt-5">
                            <div class="container container_custom ">
                                <div class="row d-flex justify-content-between ">
                                    <div class="row title_top col-lg-12 col-md-12 col-sm-6">
                                        <div class="col-lg-2 col-md-1 col-sm-12 title_cart">
                                            <h4>STT</h4>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 title_cart">
                                            <h4>PRODUCT NAME</h4>
                                        </div>
                                        <div class="col-lg-6 col-md-7 col-sm-12 d-flex text-center title_cart title_top_576">
                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                <h4>PRICE</h4>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12">
                                                <h4>QUANTITY</h4>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-12">
                                                <h4>TOTAL</h4>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach($carts as $key => $item)
                                    <div class="row title_tops list_products text-center col-lg-12 col-md-12 col-sm-6 p-2">
                                        <div class="col-lg-2 d-flex align-items-center col-md-1 col-sm-12 content_cart">
                                            <h5 class="id_cart">{{$key + 1}}</h5>
                                        </div>
                                        <div class="col-lg-4 d-flex align-items-center content_cart product_name_content col-md-4 col-sm-12">
                                            <img src="{{url('uploads')}}/{{$item->cart->image}}" alt="" width="100px" height="100px">
                                            <h5 class="mx-3">{{$item->cart->name}}</h5>
                                            @foreach($item->cart_attr as $attr)
                                            <strong>({{$attr->value}})</strong>
                                            @endforeach
                                        </div>
                                        <div class="col-lg-6 col-md-7 col-sm-12 d-flex align-items-center ">
                                            <div class="col-lg-4 col-md-4 content_cart col-sm-12">
                                                <h5>$ {{$item->cart->price}}</h5>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12">
                                                <div class="input text-center ml-3">
                                                    <input type="text" value="{{$item->quantity}}" id="">
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-5 content_cart col-sm-12">
                                                <h5>$ {{$item->total_price}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- list_cart_768 -->
                    <div class="list_cart_768 container_custom mt-5">
                        @foreach($carts as $key => $item)
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
                                    <img src="{{url('uploads')}}/{{$item->cart->image}}" alt="" width="80px" height="80px">
                                    <span>{{$item->cart->name}}</span>
                                </div>
                            </div>
                            <div class="row mt-4 d-flex align-items-center item_title">
                                <div class="col-sm-6 col-4">
                                    <h5>SIZE, COLOR</h5>
                                </div>
                                <div class="col-sm-6 col-8 text-center">
                                    @foreach($item->cart_attr as $attr)
                                    <span>({{$attr->value}})</span>
                                    @endforeach
                                </div>
                            </div>
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
                                    <div class="input ml-3">
                                        <input type="text" value="{{$item->quantity}}">
                                    </div>
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
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card p-3">
                <h5 class="text-center text-success"><strong>Summary in order</strong></h5>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr class="">
                                <td scope="row">Order value</td>
                                <td><b>$ 250</b></td>
                            </tr>
                            <tr class="">
                                <td scope="row">Transport fee</td>
                                <td><b>$ 0</b></td>
                            </tr>
                            <tr class="">
                                <td scope="row">Tax</td>
                                <td><b>$ 0</b></td>
                            </tr>
                            <tr class="">
                                <td scope="row"><b>Total</b></td>
                                <td><b>$ 250</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <strong style="border-bottom: 1px solid #111;">Note: </strong> <br>
                <b>Total</b> = Order value + Transport fee + Tax
            </div>
        </div>
    </div>
</div>
@stop()