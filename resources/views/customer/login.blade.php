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

    <main>
        @if(Session::has('yes'))
        <div class="alert alert-primary" role="alert">
            <strong>{{Session::get('yes')}}</strong>
        </div>
        @endif
        @if(Session::has('no'))
        <div class="alert alert-danger" role="alert">
            <strong>{{Session::get('no')}}</strong>
        </div>
        @endif
        <div class="container my-5" style="padding: 50px 0px;">
            <a href="{{route('index.home')}}" style="color: blue">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                    <path d="M10 12h4v4h-4z"></path>
                </svg>
            </a>
            <div class="row">
                <div class="col-lg-6">
                    <div class="col-lg-8" style="margin: 0 auto;">
                        <h4 style="font-weight: 650;">REGISTERED CUSTOMERS</h4>
                        <p class="pb-3" style="border-bottom: 1px solid gray;">If you have an account, sign in with your email address.</p>
                        <form action="" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label"><strong>Email address</strong></label>
                                <input type="text" name="email" class="form-control" placeholder="Your Email Addres ">
                                @error('email')
                                <small style="font-weight: 700; color: red;">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label"><strong>Password</strong></label>
                                <div class="ip_password">
                                    <input type="password" name="password" id="ip_pass" class="form-control" placeholder="Your Password " onkeydown="press_pass()">
                                    <i class="fa-solid fa-eye-slash d-none" id="eye_pass" onclick="show_pass()"></i>
                                    @error('password')
                                    <small style="font-weight: 700; color: red;">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary" style="font-weight: 700;">Login</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="col-lg-8" style="margin: 0 auto;">
                        <h4 style="font-weight: 650;">NEW CUSTOMERS</h4>
                        <p class="pb-3" style="border-bottom: 1px solid gray;">Reasons to Register</p>
                        <p class="mb-0"> Gives you immediate access</p>
                        <p class="p-2">
                            1. Fast checkout and easy access to order history<br>
                            2. First to know about TETHYS merchandise promotions<br>
                            3. Access to free TETHYS videos<br>
                            4. Listen to live match commentary<br>
                            5. Access to exclusive competitions<br>
                            6. Receive the official club newsletter - All in Red<br>
                            7. Join the conversation on the official TETHYS Forums
                        </p>
                        <a href="{{route('index.register')}}" class="btn btn-primary" style="font-weight: 700;">Register for free</a>
                    </div>
                </div>
            </div>
        </div>
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