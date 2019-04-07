@extends('layouts.main')

@section('content')
    <!--//END HEADER -->

    <!--============================= FEATURED PLACES =============================-->
    <section class="main-block light-bg" style="min-height: 100vh;">
        <div class="container">
            <div class="row d-flex justify-content-center mb-5">
                <div class="col-md-10">
                    <form class="form-wrap mt-4">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <input type="text" placeholder="What are your looking for?"
                                   class="btn-group1 col-8" name="search" value="{{request()->search}}">
                            {{--<input type="text" placeholder="New york" class="btn-group2">--}}
                            <button type="submit" class="btn-form"><span
                                        class="icon-magnifier search-icon"></span>SEARCH<i
                                        class="pe-7s-angle-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h4 class="h5">Results</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                @unless($books->count())
                    <div class="col-md-12 py-5 bg-white text-center text-muted">
                        <h4 class="h4">Sorry, we can't find any book with your query. For more information please
                            contact admin</h4>
                    </div>
                @endunless
                @foreach($books as $book)
                    <div class="col-md-4 featured-responsive">
                        <div class="featured-place-wrap">
                            <a href="javascript:void(0)">
                                <img src="{{asset('img/book-default.jpg')}}" class="img-fluid" alt="#">
                                <span class="featured-rating" style="    font-size: 14px;
    line-height: 35px;
    font-weight: 600;"><small>₹</small>{{$book->lend_cost}}</span>
                                <div class="featured-title-box">
                                    <h6>{{$book->name}}</h6>
                                    <p>Author: </p> <span>{{$book->author}}</span>
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
                                    <div class="bottom-icons">
                                        {{--<div class="closed-now">Rs. {{$book->price}}</div>--}}
                                        <span>
                                            @if($book->number_of_copies)
                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal"
                                                   data-id="{{$book->id}}" data-title="{{$book->name}}"
                                                   class="btn btn-outline-secondary text-uppercase font-weight-bold lend-a-book">Lend</a>
                                            @else
                                                <a href="javascript:void(0)"
                                                   class="btn btn-outline-secondary text-uppercase">Not Available Right Now</a>

                                            @endif
                                        </span>
                                        {{--<span class="ti-heart"></span>--}}
                                        {{--<span class="ti-bookmark"></span>--}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">

                {!! $books->links() !!}
                {{--<div class="col-md-4">--}}
                {{--<div class="featured-btn-wrap">--}}
                {{--<a href="#" class="btn btn-danger">VIEW ALL</a>--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </section>
    <!--//END FEATURED PLACES -->

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Lend <span id="book_title">Book</span></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form action="{{route('lend')}}" method="POST">
                @csrf
                <!-- Modal body -->
                    <div class="modal-body">
                        <p>Your Due date will be <span
                                    class="badge badge-info">{{now()->addDays(10)->format('M d Y')}}</span></p>
                        <input type="hidden" name="book_id" value="" id="book_id">
                        <p class="text-danger font-italic">NOTE: If you lost this book you should pay the book price</p>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Confirm</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $('.lend-a-book').click(function () {
            const data = $(this).data();

            $('#book_title').html(data.title);
            $('#book_id').val(data.id);
        })
    </script>
@stop