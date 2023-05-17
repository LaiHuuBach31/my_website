<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP LARAVEL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->

    <!-- swpier -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!-- css -->
    <link rel="stylesheet" href="{{url('')}}/css/layouts/master.css">
    <link rel="stylesheet" href="{{url('')}}/css/customer/home.css">
    <link rel="stylesheet" href="{{url('')}}/css/customer/shop.css">
    <link rel="stylesheet" href="{{url('')}}/css/customer/about.css">
    <link rel="stylesheet" href="{{url('')}}/css/customer/contact.css">
    <link rel="stylesheet" href="{{url('')}}/css/customer/blog.css">
    <link rel="stylesheet" href="{{url('')}}/css/customer/cart.css">
    <link rel="stylesheet" href="{{url('')}}/css/customer/detail.css">
</head>

<body>
    <!-- header -->
    <div class="header  " id="header">
        <div class="container">
            <div class="d-flex " style="align-items: center;">
                <div class="col-lg-2 top_left" style="position: unset !important;">
                    <!-- search  -->
                    <a class="iconSearch_header" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
                        <i class="fa-solid fa-magnifying-glass me-3"></i>
                    </a>
                    <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                        <div class="offcanvas-header p-0">
                            <h5 id="offcanvasTopLabel"></h5>
                            <a class="text-reset" data-bs-dismiss="offcanvas" aria-label="Close" style="text-decoration: none; cursor: pointer; color: black;">
                                <i class="fa-solid fa-x"></i> Close
                            </a>
                        </div>
                        <div class="offcanvas-body">
                            <div class="search" id="search">
                                <form action="" method="get">
                                    <div class="ip_search">
                                        <input type="text" name="" class="form-control" id="" placeholder="Search for products">
                                        <i class="fa-solid fa-magnifying-glass icon_search"></i>
                                    </div>
                                    <p class="py-1 mb-0">Start typing to see products you are looking for.</p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <i class="fa-regular fa-heart"></i> <span>0</span>
                </div>
                <div class="col-lg-8 text-center menu" style="position: unset !important;">
                    <div class="d-flex " style="align-items: center;">
                        <div class="col-lg-5" style="position: unset !important; text-align: right; padding: 0 15px;">
                            <ul class="m-0">
                                <li>
                                    <a href="{{route('index.home')}}">Home</a>
                                </li><span><i style="font-size: 10px;color: gray;" class="fa-solid fa-chevron-down"></i></span>
                                <li>
                                    <a href="{{route('index.shop')}}">Shop</a>
                                    <div class=" shop_menu" style="border: 1px solid gray;">
                                        <div class="bg_shop py-4">
                                            <div class="d-flex">
                                                <div class="col-lg-8" style="padding: 0 15px;">
                                                    <div class="d-flex">
                                                        <div class="col-lg-3 menu_shop">
                                                            <h6 style="font-weight: 800;">PRODUCT ARCHIVE</h6>
                                                            <a href="#">Off canvas sidebar</a><br>
                                                            <a href="#">Filters widget area</a><br>
                                                            <a href="#">With background</a><br>
                                                            <a href="#">Without heading</a><br>
                                                            <a href="#">Show categories</a><br>
                                                            <a href="#">Category description</a><br>
                                                            <a href="#">Category description</a><br>
                                                            <a href="#">Header overlap<span class="btn btn-info ml-2">HOT</span></a> <br>
                                                            <a href="#">Masonry grid</a>
                                                        </div>
                                                        <div class="col-lg-3 menu_shop">
                                                            <h6 style="font-weight: 800;"> PRODUCT HOVERS</h6>
                                                            <a href="#">Summary</a><br>
                                                            <a href="#">Simple <span class="btn btn-danger ml-2">NEW</span></a><br>
                                                            <a href="#">Bottom button</a><br>
                                                            <a href="#">Button on image</a><br>
                                                            <a href="#">Content on images</a><br>
                                                            <a href="#">Icons on image</a><br>
                                                            <a href="#">Category default</a><br>
                                                            <a href="#">Category mask</a> <br>
                                                            <a href="#">Category with subcat</a>
                                                        </div>
                                                        <div class="col-lg-3 menu_shop">
                                                            <h6 style="font-weight: 800;">SINGLE PRODUCT</h6>
                                                            <a href="#"> Default</a><br>
                                                            <a href="#">Custom template </a><br>
                                                            <a href="#">Thumbnails left</a><br>
                                                            <a href="#">Thumbnails bottom</a><br>
                                                            <a href="#">One column</a><br>
                                                            <a href="#">Two columns</a><br>
                                                            <a href="#"> With sidebar <span class="btn btn-warning ml-2 text-light">HOT</span></a><br>
                                                            <a href="#">Accordion tabs</a> <br>
                                                            <a href="#"> Sticky product</a>
                                                        </div>
                                                        <div class="col-lg-3 menu_shop">
                                                            <h6 style="font-weight: 800;">THEME FEATURES</h6>
                                                            <a href="#"> Stock progress bar</a><br>
                                                            <a href="#">With countdown timer</a><br>
                                                            <a href="#">Product with video</a><br>
                                                            <a href="#">Infinite scrolling <span class="btn btn-success ml-2"> NEW</span></a><br>
                                                            <a href="#">Load more pagination</a><br>
                                                            <a href="#">Review images</a><br>
                                                            <a href="#">Cookies info </a><br>
                                                            <a href="#">Sticky add to cart</a> <br>
                                                            <a href="#">Catalog mode</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4" style="padding: 0 15px;">
                                                    <div class="d-flex">
                                                        <div class="col-lg-6" style="padding: 0 15px;">
                                                            <div class="best_fashion text-light">
                                                                <div class="text_shop">
                                                                    <p>When to use lorem</p>
                                                                    <h4>Best Fashion Bloggers</h4>
                                                                </div>
                                                                <img src="https://space.xtemos.com/demo/tethys/wp-content/uploads/sites/18/2020/01/tethys-header-banner-1.jpg" width="100%" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6" style="padding: 0 15px;">
                                                            <div class="best_fashion text-light" style="margin-bottom: 35px;">
                                                                <div class="text_shop while_other">
                                                                    <p> While others defend</p>
                                                                    <h4>Top 10 Red-carpet Styles</h4>
                                                                </div>
                                                                <img src="https://space.xtemos.com/demo/tethys/wp-content/uploads/sites/18/2020/01/tethys-header-banner-3.jpg" width="100%" height="150px" alt="">
                                                            </div>
                                                            <div class="best_fashion text-light">
                                                                <div class="text_shop while_other">
                                                                    <p>Modern and stylish outfit</p>
                                                                    <h4>Tranding Summer Fashion</h4>
                                                                </div>
                                                                <img src="https://space.xtemos.com/demo/tethys/wp-content/uploads/sites/18/2020/01/tethys-header-banner-2.jpg" width="100%" height="150px" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <span><i style="font-size: 10px; color: gray;" class="fa-solid fa-chevron-down"></i></span>
                                <li>
                                    <a href="{{route('index.blog')}}">Blog </a>
                                    <div class="shop_menu ">
                                        <div class="col-lg-8 py-3 blog_menu" style="margin: 0 auto;border: 1px solid gray;">
                                            <div class="d-flex">
                                                <div class="col-lg-6 pr-0 " style="border-right: 1px solid gray;">
                                                    <div class="d-flex">
                                                        <div class="col-lg-6 menu_shop" style="padding: 0 15px;">
                                                            <h6 style="font-weight: 800;"> BLOG POSTS</h6>
                                                            <a href="#">Post Example #1</a><br>
                                                            <a href="#">Post Example #2</a><br>
                                                            <a href="#">Post Example #3</a><br>
                                                            <a href="#">Post Gutenberg</a><br>
                                                            <br>
                                                            <h6 style="font-weight: 800;">BLOG SIDEBAR</h6>
                                                            <a href="#">Without sidebar</a><br>
                                                            <a href="#">With sidebar <span class="btn btn-success ml-2">NEW</span></a><br>
                                                            <a href="#">Sticky sidebar</a><br>
                                                        </div>
                                                        <div class="col-lg-6 menu_shop pr-0 pl-0" style="padding: 0 15px;">
                                                            <h6 style="font-weight: 800;">FEATURES</h6>
                                                            <a href="#">Image in page title</a><br>
                                                            <a href="#">Content layout boxed</a><br>
                                                            <a href="#">Masonry layout <span class="btn btn-danger ml-2">HOT</span></a><br>
                                                            <a href="#">One column layout</a><br>
                                                            <a href="#">Different post sizes</a><br>
                                                            <a href="#">Video post format</a><br>
                                                            <a href="#">Quote post format</a><br>
                                                            <a href="#">Gallery post format</a> <br>
                                                            <a href="#">Link post format</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6" style="padding: 0 15px;">
                                                    <h6 style="font-weight: 800;">RECENT POSTS</h6>
                                                    <div class="">
                                                        <div class="d-flex">
                                                            <div class="col-lg-3 pl-0" style="padding: 0 15px;">
                                                                <img src="https://space.xtemos.com/demo/tethys/wp-content/uploads/sites/18/elementor/thumbs/thetys-blog-10-ovgey4iz1n91v2ykr4uf1bgq45emfszbaxsv5iv0bc.jpg" width="100%" height="50px" alt="">
                                                            </div>
                                                            <div class="col-lg-9" style="padding: 0 15px;">
                                                                <h6>Independent jewellery designers</h6>
                                                                <p>
                                                                    <i class="fa-regular fa-calendar"></i>
                                                                    <span>December 31, 2022 </span>
                                                                    <i class="fa-regular fa-comment ml-3"></i> <span>1
                                                                        Comment</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="d-flex">
                                                            <div class="col-lg-3 pl-0" style="padding: 0 15px;">
                                                                <img src="https://space.xtemos.com/demo/tethys/wp-content/uploads/sites/18/elementor/thumbs/thetys-blog-9-ovgey6enfbbmiavug5no6aznax5cv76rz73u42s7yw.jpg" width="100%" height="50px" alt="">
                                                            </div>
                                                            <div class="col-lg-9" style="padding: 0 15px;">
                                                                <h6>15 black & white party dresses</h6>
                                                                <p>
                                                                    <i class="fa-regular fa-calendar"></i>
                                                                    <span>December 31, 2022 </span>
                                                                    <i class="fa-regular fa-comment ml-3"></i> <span>1
                                                                        Comment</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="d-flex">
                                                            <div class="col-lg-3 pl-0" style="padding: 0 15px;">
                                                                <img src="https://space.xtemos.com/demo/tethys/wp-content/uploads/sites/18/elementor/thumbs/thetys-blog-6-ovgey2nanz6h7v1b2415wbxsxdnw0erumohw6yxsns.jpg" width="100%" height="50px" alt="">
                                                            </div>
                                                            <div class="col-lg-9" style="padding: 0 15px;">
                                                                <h6>Incredible concept homes</h6>
                                                                <p>
                                                                    <i class="fa-regular fa-calendar"></i>
                                                                    <span>December 31, 2022 </span>
                                                                    <i class="fa-regular fa-comment ml-3"></i> <span>1
                                                                        Comment</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="d-flex">
                                                            <div class="col-lg-3 pl-0" style="padding: 0 15px;">
                                                                <img src="https://space.xtemos.com/demo/tethys/wp-content/uploads/sites/18/elementor/thumbs/thetys-blog-5-ovgey2nanz6h7v1b2415wbxsxdnw0erumohw6yxsns.jpg" width="100%" height="50px" alt="">
                                                            </div>
                                                            <div class="col-lg-9" style="padding: 0 15px;">
                                                                <h6>Continue to support projects</h6>
                                                                <p>
                                                                    <i class="fa-regular fa-calendar"></i>
                                                                    <span>December 31, 2022 </span>
                                                                    <i class="fa-regular fa-comment ml-3"></i> <span>1
                                                                        Comment</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <span><i style="font-size: 10px; color: gray;" class="fa-solid fa-chevron-down"></i></span>
                            </ul>
                        </div>
                        <div class="col-lg-3" style="padding: 0 15px;">
                            <img src="https://spacedemo-cec2.kxcdn.com/demo/tethys/wp-content/uploads/sites/18/2019/11/tethys-logo.svg" alt="" width="100%">
                        </div>
                        <div class="col-lg-5" style="padding: 0 15px; text-align: left;">
                            <ul class="m-0 p-0">
                                <li><a href="{{route('index.contact')}}">Contact</a></li>
                                <li><a href="{{route('index.about')}}">About</a></li>
                                <li><a href="#">Support</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 top_right d-flex">
                    <!-- user  -->
                    @if(auth('cus')->check())
                    <div class="info_cus">
                        <img src="https://phongthuyhomang.vn/wp-content/uploads/2021/01/co-4-la.jpg" alt="" width="25px" height="25px" style="border-radius: 50%;">

                        <div class="account_cus">
                            <ul>
                                <li><a href="" style="color: #fff;"><strong></i>{{auth('cus')->user()->name}}</strong></a></li>
                               
                                <li><a href="{{route('index.logout')}}" style="color: #fff;"><strong><i class="fa fa-sign-out" aria-hidden="true"></i></strong></a></li>
                            </ul>
                        </div>
                        @else
                        <a href="{{route('index.login')}}">
                            <i class="fa-regular fa-user mx-3"></i>
                        </a>
                        @endif

                    </div>



                    <!-- cart -->
                    <div class="">
                        @if(auth('cus')->check())
                        <a type="button" class=" position-relative" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                            <i class="fa-solid fa-cart-shopping ms-3"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                                {{$totalCart}}
                            </span>
                        </a>
                        @else
                        <a href="{{route('cart.view')}}" style="color:#111"><i class="fa-solid fa-cart-shopping"></i></a>
                        @endif

                    </div>


                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <h5 id="offcanvasRightLabel">Shoping Cart</h5>
                            <a class="text-reset" data-bs-dismiss="offcanvas" aria-label="Close" style="text-decoration: none; cursor: pointer;">
                                <i class="fa-solid fa-x"></i> Close
                            </a>
                        </div>
                        <div class="offcanvas-body">
                            <div class="cart" id="cart">
                                <div class="">
                                    @if($check == 0)
                                    <div class="no_cart text-center">
                                        <img src="https://static.thenounproject.com/png/237706-200.png" class="py-5" width="80px" alt="">
                                        <h6 class="mb-3">No products in the cart</h6>
                                        <a href="{{route('index.shop')}}">Return to shop</a>
                                    </div>
                                    @else
                                    <div class="cart_product">
                                        @foreach($carts as $item)
                                        
                                        <div class="item_cart py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="col-lg-3">
                                                    <img src="{{url('uploads')}}/{{$item->cart->image}}" width="100%" alt="">
                                                </div>
                                                <div class="col-lg-9 p-0">
                                                    <div class="d-flex justify-content-between align">
                                                        <h6 class="m-0">{{$item->cart->name}}</h6>
                                                        <h6 class="d-flex">
                                                            @foreach($item->cart_attr as $size)
                                                            @if($size->name == 'size')
                                                            <strong value="{{$size->id}}">
                                                                {{$size->value}}
                                                            </strong>
                                                            @endif
                                                            @endforeach
                                                            -
                                                            @foreach($item->cart_attr as $color)
                                                            @if($color->name == 'color')
                                                            <strong value="{{$color->id}}">
                                                                {{$color->description}}
                                                            </strong>
                                                            @endif
                                                            @endforeach
                                                        </h6>
                                                        <div class="text-right">
                                                            <i class="fa-solid fa-xmark"></i>
                                                        </div>
                                                    </div>
                                                    <div class="" style="text-align: start !important; ">
                                                        <form action="" method="">
                                                            <a class="btn btn-light">-</a>
                                                            <input type="text" value="{{$item->quantity}}" style="width: 30px; border: none; outline: none;" class="text-center">
                                                            <a class="btn btn-light">+</a>
                                                        </form>
                                                        <h6 class=""><strong>$ {{$item->total_price}}</strong> </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach


                                        <div class="pay">
                                            <div class="d-flex align-items-center justify-content-between py-3 total">
                                                <h5>Subtotal:</h5>
                                                <h5>$ {{$subTotal}}</h5>
                                            </div>
                                            <div class="text-center py-3">
                                                <div class="view_cart">
                                                    <a href="{{route('cart.view')}}">View Cart</a>
                                                </div>
                                                <!-- <div class="check_out">
                                                    <a href="{{route('cart.checkout')}}">Checkout</a>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- 1024 -->
    <div class="header_1024 py-3" id="header_1024">
        <div class="top_1024">
            <div class="d-flex  align-items-center justify-content-between">
                <div class="col-lg-4   text-left">
                    <!-- menu -->
                    <a class="text-dark" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                        <i class="fa-solid fa-bars ms-3"></i>
                    </a>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-body">
                            <div class="menu_1024s" id="menu_1024">
                                <div class="py-4" style="position: relative;">
                                    <form action="" method="get">
                                        <div class="search_1024">
                                            <input type="text" name="" id="" class="form-control" placeholder="Search for products">
                                            <i class="fa-solid fa-magnifying-glass iconS_1024"></i>
                                        </div>
                                    </form>
                                    <div class="">
                                        <div class="d-flex justify-content-between align-items-center menu_1024">
                                            <a href="#">Home</a>
                                            <a class="text-dark" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <i class="fa-solid fa-chevron-right"></i>
                                            </a>
                                        </div>
                                        <div class="collapse" id="collapseExample">
                                            <div class="card card-body" style="border: none !important;">
                                                <div class="menu1024_2">
                                                    <ul class="p-0">
                                                        <li><a href="#">Home #1</a></li>
                                                        <li><a href="#">Home #2</a></li>
                                                        <li><a href="#">Home #3</a></li>
                                                        <li><a href="#">Home #4</a></li>
                                                        <li><a href="#">Home #5</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="d-flex justify-content-between align-items-center menu_1024">
                                            <a href="#">Shop</a>
                                            <a class="text-dark" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <i class="fa-solid fa-chevron-right"></i>
                                            </a>
                                        </div>
                                        <div class="collapse" id="collapseExample2">
                                            <div class="card card-body" style="border: none !important;">
                                                <div class="menu1024_2">
                                                    <ul class="p-0">
                                                        <li><a href="#">Shop filters</a></li>
                                                        <li><a href="#">Header overlap</a></li>
                                                        <li><a href="#">Show categories</a></li>
                                                        <li><a href="#">Product accordion tabs</a></li>
                                                        <li><a href="#">Sticky add to cart</a></li>
                                                        <li><a href="#">Animation in view</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="d-flex justify-content-between align-items-center menu_1024">
                                            <a href="#">Blog</a>
                                            <a class="text-dark" data-bs-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <i class="fa-solid fa-chevron-right"></i>
                                            </a>
                                        </div>
                                        <div class="collapse" id="collapseExample3">
                                            <div class="card card-body" style="border: none !important;">
                                                <div class="menu1024_2">
                                                    <ul class="p-0">
                                                        <li><a href="#">Post Example #1</a></li>
                                                        <li><a href="#">Post Example #2</a></li>
                                                        <li><a href="#">Post Example #3</a></li>
                                                        <li><a href="#">Post Gutenberg</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="menuOnce_1024 ">
                                        <a href="">About</a>
                                    </div>
                                    <div class="menuOnce_1024">
                                        <a href="">Contacts</a>
                                    </div>
                                    <div class="menuOnce_1024">
                                        <a href=""><i class="fa-regular fa-heart mr-1"></i> Wishlist</a>
                                    </div>
                                    <div class="menuOnce_1024">
                                        <a class="">
                                            <i class="fa-regular fa-user mr-1"></i> Login / Register
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 " style="text-align: center;">
                    <img src="https://spacedemo-cec2.kxcdn.com/demo/tethys/wp-content/uploads/sites/18/2019/11/tethys-logo.svg" alt="">
                </div>
                <div class="col-lg-4  iconCart_1024">
                    <!-- cart  -->
                    <a class="text-dark" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight2" aria-controls="offcanvasRight">
                        <i class="fa-solid fa-cart-shopping me-3"></i>
                    </a>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight2" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <h5 id="offcanvasRightLabel">Shoping Cart</h5>
                            <a class="text-reset" data-bs-dismiss="offcanvas" aria-label="Close" style="text-decoration: none; cursor: pointer;">
                                <i class="fa-solid fa-x"></i> Close
                            </a>
                        </div>
                        <div class="offcanvas-body">
                            <div class="cart" id="cart">
                                <div class="">
                                    <!-- <div class="no_cart text-center">
                    <img src="https://static.thenounproject.com/png/237706-200.png" class="py-5" width="80px" alt="">
                    <h6 class="mb-3">No products in the cart</h6>
                    <a href="">Return to shop</a>
                  </div> -->
                                    <div class="cart_product">
                                        <div class="item_cart py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="col-lg-3">
                                                    <img src="https://space.xtemos.com/demo/tethys/wp-content/uploads/sites/18/2019/11/tethys-prod-21.jpg" width="100px" alt="">
                                                </div>
                                                <div class="col-lg-9 p-0">
                                                    <div class="d-flex justify-content-between">
                                                        <h6 class="m-0">Tên sản phẩm - màu, size</h6>
                                                        <div class="text-right">
                                                            <i class="fa-solid fa-xmark"></i>
                                                        </div>
                                                    </div>
                                                    <div class="text-left">
                                                        <form action="" method="">
                                                            <a class="btn btn-light">-</a>
                                                            <input type="text" value="1" style="width: 30px; border: none; outline: none;" class="text-center">
                                                            <a class="btn btn-light">+</a>
                                                        </form>
                                                        <h6 class="">(số lượng) 1 -> (giá) $ 100 </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item_cart py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="col-lg-3">
                                                    <img src="https://space.xtemos.com/demo/tethys/wp-content/uploads/sites/18/2019/11/tethys-prod-21.jpg" width="100px" alt="">
                                                </div>
                                                <div class="col-lg-9 p-0">
                                                    <div class="d-flex justify-content-between">
                                                        <h6 class="m-0">Tên sản phẩm - màu, size</h6>
                                                        <div class="text-right">
                                                            <i class="fa-solid fa-xmark"></i>
                                                        </div>
                                                    </div>
                                                    <div class="text-left">
                                                        <form action="" method="">
                                                            <a class="btn btn-light">-</a>
                                                            <input type="text" value="1" style="width: 30px; border: none; outline: none;" class="text-center">
                                                            <a class="btn btn-light">+</a>
                                                        </form>
                                                        <h6 class="">(số lượng) 1 -> (giá) $ 100 </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pay">
                                            <div class="d-flex align-items-center justify-content-between py-3 total">
                                                <h5>Subtotal:</h5>
                                                <h5>$ 100</h5>
                                            </div>
                                            <div class="text-center py-3">
                                                <div class="view_cart">
                                                    <a href="{{route('cart.view')}}">View Cart</a>
                                                </div>
                                                <div class="check_out">
                                                    <a href="#">Checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- main -->

    <main>

        @yield('main')
        <button onclick="topFunction()" id="myBtn" title="Go to top">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M6 15l6 -6l6 6"></path>
            </svg>
        </button>
    </main>

    <!-- footer -->

    <div class="footer">
        <div class="container">
            <div class="top_footer mb-5 mt-5">
                <div class="row text-center">
                    <div class="col-lg-2 col-md-6">
                        <img src="https://spacedemo-cec2.kxcdn.com/demo/tethys/wp-content/uploads/sites/18/2019/11/tethys-brand-3.svg" alt="">
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <img src="https://spacedemo-cec2.kxcdn.com/demo/tethys/wp-content/uploads/sites/18/2019/11/tethys-brand-2.svg" alt="">
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <img src="https://spacedemo-cec2.kxcdn.com/demo/tethys/wp-content/uploads/sites/18/2019/11/tethys-brand-1.svg" alt="">
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <img src="https://spacedemo-cec2.kxcdn.com/demo/tethys/wp-content/uploads/sites/18/2019/11/tethys-brand-7.svg" alt="">
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <img src="https://spacedemo-cec2.kxcdn.com/demo/tethys/wp-content/uploads/sites/18/2019/11/tethys-brand-6.svg" alt="">
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <img src="https://spacedemo-cec2.kxcdn.com/demo/tethys/wp-content/uploads/sites/18/2019/11/tethys-brand-8.svg" alt="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <img src="https://spacedemo-cec2.kxcdn.com/demo/tethys/wp-content/uploads/sites/18/2019/11/tethys-logo.svg" width="100" alt="">
                    <p class="mt-3">Signup to be the first to hear about exclusive deals, special offers and upcoming
                        collections.</p>
                    <p>111 Wall Stree, USA, New York</p>
                    <p>+1 (234) 567 8900</p>

                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 useful">
                            <h6>Useful Links</h6>
                            <a href="#">Blog</a><br>
                            <a href="#">My Account</a><br>
                            <a href="#">Wishlist</a><br>
                            <a href="#">Terms of Service</a><br>
                            <a href="#">Purchase Theme</a><br>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 useful">
                            <h6>Information</h6>
                            <a href="#">Shop</a><br>
                            <a href="#">Contact Us</a><br>
                            <a href="#">About Us</a><br>
                            <a href="#">Privacy Policy</a><br>
                            <a href="#">FAQ</a><br>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 useful">
                            <h6>Categories</h6>
                            <a href="#">Accessories</a><br>
                            <a href="#">Man</a><br>
                            <a href="#">Woman</a><br>
                            <a href="#">Clothing</a><br>
                            <a href="#">Kids</a><br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h6>Newsletter</h6>
                    <p>
                        Get Tethys. and discover streamlined website construction today!
                    </p>
                    <div class="my-4">
                        <form action="" method="get">
                            <div class="d-flex align-items-center">
                                <div class="col-lg-9">
                                    <input type="text" name="" id="" class="form-control p-2" placeholder="Your email address" style="border-radius: 0;">
                                </div>
                                <div class="col-lg-3">
                                    <button type="submit" class="btn btn-dark p-2" style="font-weight: 600; border-radius: 0;">
                                        <i class="fa-solid fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <i class="fa-brands fa-facebook me-2"></i>
                        <i class="fa-brands fa-instagram me-2"></i>
                        <i class="fa-brands fa-twitter me-2"></i>
                        <i class="fa-brands fa-youtube me-2"></i>
                        <i class="fa-brands fa-tiktok me-2"></i>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <div class="last_footer container">
            <div class="row">
                <div class="col-lg-6">
                    <p>TETHYS © 2022 Created By XTemos Studio</p>
                </div>
                <div class="col-lg-6 ">
                    <div class="d-flex end_footer text-right">
                        <a href="#">Contact Us</a>
                        <a href="#">Privacy Policy</a>
                        <a href="#">Terms and Conditions</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- script -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script> -->
    <script src="{{url('')}}/js/layouts/master.js"></script>
    <script src="{{url('')}}/js/customer/home.js"></script>
    <script src="{{url('')}}/js/customer/about.js"></script>
    <script src="{{url('')}}/js/customer/detail.js"></script>
    <script src="{{url('')}}/js/customer/cart.js"></script>
    <script>

    </script>

</body>

</html>