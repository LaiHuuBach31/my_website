@extends('layouts.master')
@section('main')
<div class="container" style="margin-top: 100px;">
    <div class="d-flex justify-content-between align-items-center p-2">
        <div>
            <h3>Shop</h3>
        </div>
        <div>
            <a href="{{route('index.home')}}" style="text-decoration: none; color: gray;">Home</a> > <b><a href="{{route('index.shop')}}" style="color: #111; text-decoration: none;">Shop</a></b>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-lg-3">
            <h6>Search</h6>
            <div class="filter_price">
                <form action="{{route('index.shop')}}" method="get">

                    <div class="search_pro mt-2 mb-5">

                        <input type="text" class="form-control" name="keyword" style="border: none; border-bottom: 2px solid #111;">
                        <button type="submit" style="border: none; background-color: #fff;"><i class="fa fa-search" aria-hidden="true"></i></button>

                    </div>

                </form>

            </div>
            <hr>
            <h6>Filter by Price</h6>
            <div class="filter_price">
                <form action="{{route('index.shop')}}" method="get">

                    <div class="filter_price mt-4">
                        <div class="range mt-4">
                            <div class="max_min_value">
                                <span class="from"><b>$ {{$priceMin}}</b></span>
                                <span class="to"><b>$ {{$priceMax}}</b></span>
                            </div>
                            <div class="sort_price mt-2">
                                <input type="text" name="min_price">
                                <span>—</span>
                                <input type="text" name="max_price">
                            </div>
                        </div>
                    </div>

                    <div class="my-4" style="text-align: end;">
                        <button type="submit" class="btn btn-dark"><b>Filter</b></button>
                    </div>
                </form>

            </div>
            <hr>
            <h6>Filter by Color</h6>
            <div class="scrollbar ">
                <div class="filter_color ">
                    <!-- <form action="" method="post"> -->
                    <ul>
                        @foreach($colors as $item)
                        <li class="d-flex align-items-center justify-content-between">
                            <div>

                                <a href="?color={{$item->id}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="color:{{$item->value}}" class="icon icon-tabler icon-tabler-shirt-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M14.883 3.007l.095 -.007l.112 .004l.113 .017l.113 .03l6 2a1 1 0 0 1 .677 .833l.007 .116v5a1 1 0 0 1 -.883 .993l-.117 .007h-2v7a2 2 0 0 1 -1.85 1.995l-.15 .005h-10a2 2 0 0 1 -1.995 -1.85l-.005 -.15v-7h-2a1 1 0 0 1 -.993 -.883l-.007 -.117v-5a1 1 0 0 1 .576 -.906l.108 -.043l6 -2a1 1 0 0 1 1.316 .949a2 2 0 0 0 3.995 .15l.009 -.24l.017 -.113l.037 -.134l.044 -.103l.05 -.092l.068 -.093l.069 -.08c.056 -.054 .113 -.1 .175 -.14l.096 -.053l.103 -.044l.108 -.032l.112 -.02z" stroke-width="0" fill="currentColor"></path>
                                    </svg>
                                </a>
                            </div>
                            <span class="mx-2">( {{$item->description}} )</span>
                        </li>
                        @endforeach
                    </ul>
                    <!-- </form> -->
                </div>
            </div>
            <hr>
            <h6>Filter by Size</h6>
            <div class="filter_size">
                <ul>
                    @foreach($sizes as $item)
                    <li>
                        <a href="?size={{$item->id}}">{{$item->value}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <hr>
            <div class="sale_off text-center">
                <h3>Autumn Sale</h3>
                <h1>15%</h1>
                <p class="text-secondary">
                    Unpacked reserved sir offering bed may and quitting speaking.
                </p>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div style="border-bottom: 2px solid #111;">
                        <b class="mb-2">Category : </b>
                    </div>
                    <div class="categories">
                        <ul>
                            @foreach($categories as $item)
                            <li><a href="?cate={{$item->id}}">{{$item->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="d-flex align-items-center">

                    <form action="{{route('index.shop')}}" method="get">
                        <div class="d-flex">
                            <div>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="sort">
                                    <option value="">Default sorting</option>
                                    <option value="latest">Sort by latest</option>
                                    <option value="low_to_high">Sort by price: low to high</option>
                                    <option value="high_to_low">Sort by price: high to low</option>
                                </select>
                            </div>
                            <div>
                                <button class="btn btn-primary" style="height: 31px;">
                                    <i class="fa fa-filter" aria-hidden="true" style="vertical-align: super;"></i>
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

            <div class="row my-3">
                <div class="row">
                    @if(count($products) == 0)
                    <h3 class="text-center mt-5">No Products Found !</h3>
                    @else
                    @foreach($products as $item)
                    <div class="col-lg-3">
                        <div class="item1 my-4">
                            <div class="product_top">
                                <div class="image_pro">
                                    <img class="img_first" src="{{url('uploads')}}/{{$item->image}}" width="100%" alt="">
                                    @if(isset($item->image_view[0]))
                                    <img class="img_secound" src="{{url('uploads')}}/{{$item->image_view[0]->value}}" width="100%" alt="">
                                    @else
                                    <img class="img_secound" src="{{url('uploads')}}/{{$item->image}}" width="100%" alt="">
                                    @endif
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

                                <!-- <div class="sale text-center">
                                    <p class="m-0">50%</p>
                                </div> -->

                                <div class="d-flex justify-content-between align-items-center p-1 mt-1" style="flex-wrap: wrap;">
                                    <div>
                                        <p class="m-0" style="opacity: 0.9;">{{$item->name}}</p>
                                    </div>
                                    <div>
                                        @if($item->sale_price > 0)
                                        <p class="m-0" style="font-weight: 700; text-decoration: line-through;">$ {{$item->price}}.00</p>
                                        <p class="m-0 text-danger" style="font-weight: 700; ">$ {{$item->sale_price}}.00</p>
                                        @else
                                        <p class="m-0" style="font-weight: 700;">$ {{$item->price}}.00</p>
                                        @endif

                                    </div>
                                </div>
                                <div class="select_optopn p-1">
                                    <a href="{{route('index.product_detail', $item->id)}}">select options</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>

            {{$products->appends(request()->all())->links()}}

        </div>
    </div>
</div>

<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@stop()