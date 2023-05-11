@extends('layouts.master')
@section('main')
<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-lg-4 col-md-5">
            <div class="contact_left">
                <p>Clothes that you like</p>
                <h1>Contact Us</h1>

                <h4>HA NOI CITY</h4>

                <table class="table">
                    <tbody>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td>Ha Noi, Viet Nam</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>:</td>
                            <td>+39 06 678 5552</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>tethys.hanoi@mail.com</td>
                        </tr>
                    </tbody>
                </table>

                <h4>HO CHI MINH CITY</h4>

                <table class="table">
                    <tbody>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td>Ho Chi Minh, Viet Nam</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>:</td>
                            <td>+1 212-334-0212</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>tethys.hochiminh@mail.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-8 col-md-7">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d607671.495686642!2d105.40597058626794!3d20.984256060034166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135008e13800a29%3A0x2987e416210b90d!2zSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1676104534154!5m2!1svi!2s" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
    <div class="row my-5">
        <div class="col-lg-3 col-md-6 support_customer">
            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-delivery" width="60" height="60" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                    <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                    <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"></path>
                    <path d="M3 9l4 0"></path>
                </svg>
                <h4>Free Worldwide Shipping</h4>
                <p class="text-secondary">Clintock's eye for detail certainly helped narrow the whereabouts of lorem
                    ipsum's origin.</p>
            </div>

            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shield-check" width="60" height="60" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M9 12l2 2l4 -4"></path>
                    <path d="M12 3a12 12 0 0 0 8.5 3a12 12 0 0 1 -8.5 15a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3">
                    </path>
                </svg>
                <h4>Shopping Protection</h4>
                <p class="text-secondary">Today it's seen all around the web, on templates, websites, and other
                    stock designs.</p>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 support_customer">
            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cash" width="60" height="60" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M7 9m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path>
                    <path d="M14 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                    <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path>
                </svg>
                <h4>Save Payments</h4>
                <p class="text-secondary">Laying out pages with meaningless filler text can be very useful when the
                    focus is meant.</p>
            </div>
            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone-call" width="60" height="60" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                    </path>
                    <path d="M15 7a2 2 0 0 1 2 2"></path>
                    <path d="M15 3a6 6 0 0 1 6 6"></path>
                </svg>
                <h4>24/7 Support</h4>
                <p class="text-secondary">Laying out pages with meaningless filler text can be very useful when the
                    focus is meant.</p>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="your_question">
                <p>Modern and stylish outfit</p>
                <h1 class="m-0">Ask Your Questions</h1>
                <p class="mb-5">What I find remarkable is that this text has been the industry's standard dummy text
                    ever since some printer in the lorem.</p>

                <form action="" method="get">
                    <div class="row g-2 mb-3">
                        <div class="col-md">
                            <div class="ip">
                                <input type="text" class="form-control" name="name" id="" placeholder="Your Name" value="">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="ip">
                                <input type="text" class="form-control" name="email" id="" placeholder="Your Email" value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md ">
                        <div class="ip">
                            <input type="text" class="form-control" name="subject" id="" placeholder="Subject" value="">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"></label>
                        <textarea class="form-control" name="content" placeholder="Your Content"  rows="8"></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark" style="border-radius: 0; font-weight: 600;">Send</button>
                </form>

            </div>
        </div>
    </div>
</div>
@stop()