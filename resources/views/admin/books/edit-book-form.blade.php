@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Update {{$book->name}}</h2>
                    {{--<ul class="nav navbar-right panel_toolbox">--}}
                    {{--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>--}}
                    {{--</li>--}}
                    {{--<li class="dropdown">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"--}}
                    {{--aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
                    {{--<ul class="dropdown-menu" role="menu">--}}
                    {{--<li><a href="#">Settings 1</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="#">Settings 2</a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li><a class="close-link"><i class="fa fa-close"></i></a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left"
                          novalidate="" action="{{route('books.update',[$book->id])}}" method="POSt">

                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" required="required" name="name"
                                       class="form-control col-md-7 col-xs-12" value="{{old('name')??$book->name}}">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author">Author <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="author" required="required" name="author"
                                       class="form-control col-md-7 col-xs-12" value="{{old('author')??$book->author}}">

                                @if ($errors->has('author'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('author') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number_of_copies">No. of
                                copies
                                <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="number_of_copies" required="required" name="number_of_copies"
                                       class="form-control col-md-7 col-xs-12" value="{{old('number_of_copies')??$book->number_of_copies}}">

                                @if ($errors->has('number_of_copies'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('number_of_copies') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Price <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="price" required="required" name="price"
                                       class="form-control col-md-7 col-xs-12" value="{{old('price')??$book->price}}">

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lend_cost">Lend Cost <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="lend_cost" required="required" name="lend_cost"
                                       class="form-control col-md-7 col-xs-12" value="{{old('lend_cost')??$book->lend_cost}}">

                                @if ($errors->has('lend_cost'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lend_cost') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@stop