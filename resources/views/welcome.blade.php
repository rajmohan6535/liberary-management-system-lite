@extends('layouts.main')

@section('content')
    <section class="slider d-flex align-items-center" style="background: url('{{asset('img/home-bg.jpg')}}')">
        <!-- <img src="images/slider.jpg" class="img-fluid" alt="#"> -->
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="slider-title_box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slider-content_wrap">
                                    <h4 class="text-white">Discover great places in New york</h4>
                                    {{--<h5>Let's uncover the best places to eat, drink, and shop nearest to you.</h5>--}}
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-10">
                                <form class="form-wrap mt-4" action="{{route('search')}}">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <input type="text" placeholder="What are your looking for?"
                                               class="btn-group1 col-8" name="search">
                                        {{--<input type="text" placeholder="New york" class="btn-group2">--}}
                                        <button type="submit" class="btn-form"><span
                                                    class="icon-magnifier search-icon"></span>SEARCH<i
                                                    class="pe-7s-angle-right"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// SLIDER -->
    <!--//END HEADER -->

    <!--============================= FEATURED PLACES =============================-->
    {{--<section class="main-block light-bg">--}}
        {{--<div class="container">--}}
            {{--<div class="row justify-content-center">--}}
                {{--<div class="col-md-5">--}}
                    {{--<div class="styled-heading">--}}
                        {{--<h3>Trending Books</h3>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-4 featured-responsive">--}}
                    {{--<div class="featured-place-wrap">--}}
                        {{--<a href="detail.html">--}}
                            {{--<img src="{{asset('img/book-default.jpg')}}" class="img-fluid" alt="#">--}}
                            {{--<span class="featured-rating-orange">6.5</span>--}}
                            {{--<div class="featured-title-box">--}}
                                {{--<h6>Burger & Lobster</h6>--}}
                                {{--<p>Author </p> <span>Author Name </span>--}}
                                {{--<p>3 Reviews</p> <span> • </span>--}}
                                {{--<p><span>$$$</span>$$</p>--}}
                                {{--<ul>--}}
                                {{--<li><span class="icon-location-pin"></span>--}}
                                {{--<p>1301 Avenue, Brooklyn, NY 11230</p>--}}
                                {{--</li>--}}
                                {{--<li><span class="icon-screen-smartphone"></span>--}}
                                {{--<p>+44 20 7336 8898</p>--}}
                                {{--</li>--}}
                                {{--<li><span class="icon-link"></span>--}}
                                {{--<p>https://burgerandlobster.com</p>--}}
                                {{--</li>--}}

                                {{--</ul>--}}
                                {{--<div class="bottom-icons">--}}
                                {{--<div class="closed-now">CLOSED NOW</div>--}}
                                {{--<span class="ti-heart"></span>--}}
                                {{--<span class="ti-bookmark"></span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row justify-content-center">--}}
                {{--<div class="col-md-4">--}}
                    {{--<div class="featured-btn-wrap">--}}
                        {{--<a href="#" class="btn btn-danger">VIEW ALL</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    <!--//END FEATURED PLACES -->
@stop