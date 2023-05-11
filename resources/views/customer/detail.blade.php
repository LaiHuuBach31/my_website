@extends('layouts.master')
@section('main')
<div class="" style="margin-top: 100px;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carouselAuto">
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <img src="{{url('uploads')}}/{{$product->image}}" class="d-block w-100" alt="...">
                        </div>

                        @foreach($images as $item)
                        <div class="carousel-item">
                            <img src="{{url('uploads')}}/{{$item->value}}" class="d-block w-100" alt="...">
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex align-items-center justify-content-between ">
                    <div>
                        <h3>{{$product->name}}</h3>
                    </div>
                    <div>
                        <img src="https://spacedemo-cec2.kxcdn.com/demo/tethys/wp-content/uploads/sites/18/2019/11/tethys-brand-2.svg" width="100%" alt="">
                    </div>
                </div>
                <div class="price ">
                    <h2>
                        <div class="d-flex">
                            @if($product->discount > 0)
                            <p class="m-0" style="font-weight: 700; text-decoration: line-through;">$ {{$product->price}}.00</p>
                            <p class="m-0 text-danger mx-3" style="font-weight: 700; ">$ {{$product->discount}}.00</p>
                            @else
                            <p class="m-0" style="font-weight: 700;">$ {{$product->price}}.00</p>
                            @endif
                        </div>
                    </h2>
                </div>
                <p class="my-4">
                    Aldus Corporation, which later merged with Adobe Systems, ushered lorem ipsum into the
                    information age with its desktop publishing software Aldus PageMaker. The program came
                    bundled with lorem ipsum dummy text for laying out page content, and other word processors
                    like Microsoft Word followed suit. More recently the growth of web design has helped
                    proliferate lorem ipsum across the internet as a placeholder for future text—and in some
                    cases the final content.
                </p>

                <form action="{{route('cart.add', $product)}}" method="post">
                    @csrf
                    <div class="table-responsive">
                        <table class="table infor" style="vertical-align: middle;">
                            <tbody>
                                <tr class="">
                                    <td><b>Color</b></td>
                                    <td><b>:</b></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            @foreach($attributes as $item)
                                            @if($item->name == 'color')
                                            <div class="mx-3 d-flex align-items-center">
                                                <input type="radio" name="attr_id[]" value="{{$item->id}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" style="color:{{$item->value}}" class="icon icon-tabler icon-tabler-shirt-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M14.883 3.007l.095 -.007l.112 .004l.113 .017l.113 .03l6 2a1 1 0 0 1 .677 .833l.007 .116v5a1 1 0 0 1 -.883 .993l-.117 .007h-2v7a2 2 0 0 1 -1.85 1.995l-.15 .005h-10a2 2 0 0 1 -1.995 -1.85l-.005 -.15v-7h-2a1 1 0 0 1 -.993 -.883l-.007 -.117v-5a1 1 0 0 1 .576 -.906l.108 -.043l6 -2a1 1 0 0 1 1.316 .949a2 2 0 0 0 3.995 .15l.009 -.24l.017 -.113l.037 -.134l.044 -.103l.05 -.092l.068 -.093l.069 -.08c.056 -.054 .113 -.1 .175 -.14l.096 -.053l.103 -.044l.108 -.032l.112 -.02z" stroke-width="0" fill="currentColor"></path>
                                                </svg>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td><b>Size</b></td>
                                    <td><b>:</b></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <div class="">
                                                <select class="form-select form-select-lg" name="attr_id[]" id="" style="padding-top:0; padding-bottom: 0; font-weight: 500; ">
                                                    <option selected value="">Choose your size</option>
                                                    @foreach($attributes as $item)
                                                    @if($item->name == 'size')
                                                    <option value="{{$item->id}}">{{$item->value}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <div class="d-flex text-center align-items-center">
                        <div class="quantity align-items-center">
                            <button type="button" onclick="mark('-')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-minus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>
                            </button>
                            <input type="text" value="1" name="quantity"  id="quantity">
                            <button type="button" onclick="mark('+')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 5l0 14"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="add_cart mx-3">
                            <button type="submit" style="font-weight: 700; color: #fff; background-color: #111; border: none;">Add to card</button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table infor" style="vertical-align: middle; width: 55%;">
                        <tbody>
                            <tr class="">
                                <td><b>SKU</b></td>
                                <td><b>:</b></td>
                                <td class="text-secondary">TE-21022</td>

                            </tr>
                            <tr class="">
                                <td><b>Categories</b></td>
                                <td><b>:</b></td>
                                <td class="text-secondary">Man, Man, Shirts</td>
                            </tr>
                            <tr class="">
                                <td><b>Tags</b></td>
                                <td><b>:</b></td>
                                <td class="text-secondary">Casual, Red, Shirt</td>
                            </tr>
                            <tr class="">
                                <td><b>Share</b></td>
                                <td><b>:</b></td>
                                <td class="text-secondary share_">
                                    <a href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M3 5m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z">
                                            </path>
                                            <path d="M3 7l9 6l9 -6"></path>
                                        </svg>
                                    </a>
                                    <a href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3">
                                            </path>
                                        </svg>
                                    </a>
                                    <a href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z">
                                            </path>
                                            <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                            <path d="M16.5 7.5l0 0"></path>
                                        </svg>
                                    </a>
                                    <a href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-twitter" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z">
                                            </path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="option text-center">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#detail_one" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                    DESCRIPTION
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#detail_two" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                    INFORMATION
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#detail_three" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                    SHIPPING & DELIVERY
                </button>
            </li>
        </ul>
    </div>
</div>


<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="detail_one" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="container">
            <div class="description text-secondary">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <p>Effects present letters inquiry no an removed or friends. Desire behind latter me though
                            in.
                            Supposing shameless am he engrossed up additions. My possible peculiar together to.
                            Desire so
                            <a href="">better am cannot</a> he up before points. Remember mistaken opinions it
                            pleasure of
                            debating.
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <p>The French lettering company Letraset manufactured a set of dry-transfer sheets which
                            included
                            the <i>lorem ipsum</i> filler text in a variety of fonts, sizes, and layouts. These
                            sheets of
                            lettering
                            could be rubbed on anywhere.
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <img src="https://spacedemo-cec2.kxcdn.com/demo/tethys/wp-content/uploads/sites/18/2019/11/thetys-product-page-size-guide-1.jpg" width="100%" height="150px" alt="">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <p>
                            Court front maids forty if aware their at. Chicken use are pressed removed. Effects
                            present
                            letters inquiry no an removed or friends. Desire behind latter me though in. Supposing
                            shameless
                            am he engrossed up additions. Today it's seen all around the web on templates, websites,
                            and
                            stock designs authoritative history.
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <ul>
                            <li>Nor hence hoped her after other known defer his.</li>
                            <li>For county now sister engage had season better waited.</li>
                            <li>Occasional mrs interested far expression acceptance.</li>
                            <li>Day either mrs talent pulled men rather regret admire but.</li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <p>
                            1. Nor hence hoped her after other known defer his. <br>
                            2. For county now sister engage had season better waited. <br>
                            3. Occasional mrs interested far expression acceptance. <br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="detail_two" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="container">
            <div class="information">
                <div class="table-responsive" style="width: 50%; margin: 0 auto; vertical-align: middle;">
                    <table class="table">
                        <tbody>
                            <tr class="">
                                <td><b>COLOR</b></td>
                                <td style="text-align: right;">Black, Red, Green</td>
                            </tr>
                            <tr class="">
                                <td><b>SIZE</b></td>
                                <td style="text-align: right;">S, M, L, XL</td>
                            </tr>
                            <tr class="">
                                <td><b>QUANTITY</b></td>
                                <td style="text-align: right;">55</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="detail_three" role="tabpanel" aria-labelledby="pills-contact-tab">

        <div class="container">
            <div class="shipping">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <h4>Carried Only By Professionals</h4>
                        <p class="text-secondary">
                            Richard McClintock, a Latin scholar from Hampden-Sydney College, is credited with
                            discovering
                            the source behind the ubiquitous filler text. In seeing a sample of lorem ipsum, his
                            interest
                            was piqued by consectetur—a genuine, albeit rare, Latin word. Consulting a Latin
                            dictionary led
                            McClintock to a passage from De Finibus Bonorum et Malorum (“On the Extremes of Good and
                            Evil”),
                            a first-century B.C. text from the Roman philosopher Cicero. Cicero's work, with the
                            most
                            notable passage excerpted below. Still remain something of a mystery, with competing
                            theories
                            and timelines.
                        </p>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="col-lg-9">
                                <h6>Edward Thompson</h6>
                                <p class="text-secondary">Delivery service executive director</p>
                            </div>
                            <div class="col-lg-3">
                                <img src="https://spacedemo-cec2.kxcdn.com/demo/tethys/wp-content/uploads/sites/18/2019/11/tethys-autograph.svg" width="100%" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <img src="https://spacedemo-cec2.kxcdn.com/demo/tethys/wp-content/uploads/sites/18/2019/11/shopping-1.jpg" width="100%" alt="">
                        <h3>Worldwide Shipping</h3>
                        <p class="text-secondary">
                            Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print,
                            graphic
                            or web designs.
                        </p>
                        <a href="" style="color: black; font-weight: 600;">Read more</a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <img src="https://spacedemo-cec2.kxcdn.com/demo/tethys/wp-content/uploads/sites/18/2019/11/shopping-2.jpg" width="100%" alt="">
                        <h3>Local Pickup</h3>
                        <p class="text-secondary">
                            Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print,
                            graphic
                            or web designs.
                        </p>
                        <a href="" style="color: black; font-weight: 600;">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="margin_425" style="margin: 70px 0;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="">
                <h3>Related Products</h3>
            </div>
            <div class="swiper1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="d-flex ">
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev1 prevs">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-left" width="30" height="30" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l14 0"></path>
                                    <path d="M5 12l4 4"></path>
                                    <path d="M5 12l4 -4"></path>
                                </svg>
                            </div>
                            <div class="swiper-button-next1 nexts">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-right" width="30" height="30" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l14 0"></path>
                                    <path d="M13 18l6 -6"></path>
                                    <path d="M13 6l6 6"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                    <div class="item1 my-4 p-3">
                        <div class="product_top">
                            <div class="image_pro">
                                <img class="img_first" src="https://space.xtemos.com/demo/tethys/wp-content/uploads/sites/18/2019/11/tethys-prod-21-670x800.jpg" width="100%" alt="">
                                <img class="img_secound" src="https://space.xtemos.com/demo/tethys/wp-content/uploads/sites/18/2019/11/tethys-prod-21-1-500x597.jpg" width="100%" alt="">
                            </div>
                            <div class="pro_right bg-light">
                                <div class="mt-2">
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist" style="color: #111;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="Compare" style="color: #111;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-git-compare" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M6 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M18 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M11 6h5a2 2 0 0 1 2 2v8"></path>
                                            <path d="M14 9l-3 -3l3 -3"></path>
                                            <path d="M13 18h-5a2 2 0 0 1 -2 -2v-8"></path>
                                            <path d="M10 15l3 3l-3 3"></path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="mt-2 mb-2">
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick view" style="color: #111;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                            <path d="M21 21l-6 -6"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <div class="sale text-center">
                                <p class="m-0">30%</p>
                            </div>

                            <div class="d-flex justify-content-between align-items-center p-1 mt-1" style="flex-wrap: wrap;">
                                <div>
                                    <p class="m-0" style="opacity: 0.9;">Winter white dress</p>
                                </div>
                                <div>
                                    <p class="m-0" style="font-weight: 700;">$259.000</p>
                                </div>
                            </div>
                            <div class="select_optopn p-1">
                                <a href="">select options</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="item1 my-4 p-3">
                        <div class="product_top">
                            <div class="image_pro">
                                <img class="img_first" src="https://space.xtemos.com/demo/tethys/wp-content/uploads/sites/18/2019/11/tethys-prod-3-670x800.jpg" width="100%" alt="">
                                <img class="img_secound" src="https://space.xtemos.com/demo/tethys/wp-content/uploads/sites/18/2019/11/tethys-prod-3-1-500x597.jpg" width="100%" alt="">
                            </div>
                            <div class="pro_right bg-light">
                                <div class="mt-2">
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist" style="color: #111;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="Compare" style="color: #111;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-git-compare" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M6 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M18 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M11 6h5a2 2 0 0 1 2 2v8"></path>
                                            <path d="M14 9l-3 -3l3 -3"></path>
                                            <path d="M13 18h-5a2 2 0 0 1 -2 -2v-8"></path>
                                            <path d="M10 15l3 3l-3 3"></path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="mt-2 mb-2">
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick view" style="color: #111;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                            <path d="M21 21l-6 -6"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <div class="sale text-center">
                                <p class="m-0">30%</p>
                            </div>

                            <div class="d-flex justify-content-between align-items-center p-1 mt-1" style="flex-wrap: wrap;">
                                <div>
                                    <p class="m-0" style="opacity: 0.9;">Winter white dress</p>
                                </div>
                                <div>
                                    <p class="m-0" style="font-weight: 700;">$259.000</p>
                                </div>
                            </div>
                            <div class="select_optopn p-1">
                                <a href="">select options</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="item1 my-4 p-3">
                        <div class="product_top">
                            <div class="image_pro">
                                <img class="img_first" src="https://spacedemo-cec2.kxcdn.com/demo/tethys/wp-content/uploads/sites/18/2019/11/tethys-prod-19-670x800.jpg" width="100%" alt="">
                                <img class="img_secound" src="https://spacedemo-cec2.kxcdn.com/demo/tethys/wp-content/uploads/sites/18/2019/11/tethys-prod-19-1-500x597.jpg" width="100%" alt="">
                            </div>
                            <div class="pro_right bg-light">
                                <div class="mt-2">
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist" style="color: #111;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="Compare" style="color: #111;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-git-compare" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M6 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M18 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M11 6h5a2 2 0 0 1 2 2v8"></path>
                                            <path d="M14 9l-3 -3l3 -3"></path>
                                            <path d="M13 18h-5a2 2 0 0 1 -2 -2v-8"></path>
                                            <path d="M10 15l3 3l-3 3"></path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="mt-2 mb-2">
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick view" style="color: #111;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                            <path d="M21 21l-6 -6"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <div class="sale text-center">
                                <p class="m-0">30%</p>
                            </div>

                            <div class="d-flex justify-content-between align-items-center p-1 mt-1" style="flex-wrap: wrap;">
                                <div>
                                    <p class="m-0" style="opacity: 0.9;">Winter white dress</p>
                                </div>
                                <div>
                                    <p class="m-0" style="font-weight: 700;">$259.000</p>
                                </div>
                            </div>
                            <div class="select_optopn p-1">
                                <a href="">select options</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="item1 my-4 p-3">
                        <div class="product_top">
                            <div class="image_pro">
                                <img class="img_first" src="https://spacedemo-cec2.kxcdn.com/demo/tethys/wp-content/uploads/sites/18/2019/11/tethys-prod-5-670x800.jpg" width="100%" alt="">
                                <img class="img_secound" src="https://spacedemo-cec2.kxcdn.com/demo/tethys/wp-content/uploads/sites/18/2019/11/tethys-prod-5-1-1-500x597.jpg" width="100%" alt="">
                            </div>
                            <div class="pro_right bg-light">
                                <div class="mt-2">
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist" style="color: #111;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="Compare" style="color: #111;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-git-compare" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M6 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M18 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M11 6h5a2 2 0 0 1 2 2v8"></path>
                                            <path d="M14 9l-3 -3l3 -3"></path>
                                            <path d="M13 18h-5a2 2 0 0 1 -2 -2v-8"></path>
                                            <path d="M10 15l3 3l-3 3"></path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="mt-2 mb-2">
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick view" style="color: #111;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                            <path d="M21 21l-6 -6"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <div class="sale text-center">
                                <p class="m-0">30%</p>
                            </div>

                            <div class="d-flex justify-content-between align-items-center p-1 mt-1" style="flex-wrap: wrap;">
                                <div>
                                    <p class="m-0" style="opacity: 0.9;">Winter white dress</p>
                                </div>
                                <div>
                                    <p class="m-0" style="font-weight: 700;">$259.000</p>
                                </div>
                            </div>
                            <div class="select_optopn p-1">
                                <a href="">select options</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="item1 my-4 p-3">
                        <div class="product_top">
                            <div class="image_pro">
                                <img class="img_first" src="https://spacedemo-cec2.kxcdn.com/demo/tethys/wp-content/uploads/sites/18/2019/11/tethys-prod-12-670x800.jpg" width="100%" alt="">
                                <img class="img_secound" src="https://spacedemo-cec2.kxcdn.com/demo/tethys/wp-content/uploads/sites/18/2019/11/tethys-prod-12-1-500x597.jpg" width="100%" alt="">
                            </div>
                            <div class="pro_right bg-light">
                                <div class="mt-2">
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist" style="color: #111;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="Compare" style="color: #111;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-git-compare" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M6 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M18 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M11 6h5a2 2 0 0 1 2 2v8"></path>
                                            <path d="M14 9l-3 -3l3 -3"></path>
                                            <path d="M13 18h-5a2 2 0 0 1 -2 -2v-8"></path>
                                            <path d="M10 15l3 3l-3 3"></path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="mt-2 mb-2">
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick view" style="color: #111;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                            <path d="M21 21l-6 -6"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <div class="sale text-center">
                                <p class="m-0">30%</p>
                            </div>

                            <div class="d-flex justify-content-between align-items-center p-1 mt-1" style="flex-wrap: wrap;">
                                <div>
                                    <p class="m-0" style="opacity: 0.9;">Winter white dress</p>
                                </div>
                                <div>
                                    <p class="m-0" style="font-weight: 700;">$259.000</p>
                                </div>
                            </div>
                            <div class="select_optopn p-1">
                                <a href="">select options</a>
                            </div>
                        </div>

                    </div>
                </div>


            </div>

        </div>

    </div>
</div>

@stop()