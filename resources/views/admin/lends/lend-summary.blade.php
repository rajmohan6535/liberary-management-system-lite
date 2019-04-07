@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Lend Summary</small></h2>
                    {{--<ul class="nav navbar-right panel_toolbox">--}}
                    {{--<li><a href="{{route('books.create')}}" class="btn btn-primary"><i--}}
                    {{--class="fa fa-plus-circle"></i> Add New Book</a>--}}
                    {{--</ul>--}}
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if($action==1)
                        <form action="{{route('lend.actions',[$action,$lend->id])}}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <p>
                                    Total Amount have to
                                    pay: {{$lend->book->lend_cost+($lend->isOverdue() ? $lend->calculateFine() : 0)}}
                                </p>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">Pay</button>
                            </div>
                        </form>
                    @elseif($action==0)
                        <form action="{{route('lend.actions',[$action,$lend->id])}}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <p>
                                    Total Amount have to
                                    pay: {{$lend->book->price}}
                                </p>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">Pay</button>
                            </div>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>

@stop