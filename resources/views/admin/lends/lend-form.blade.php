@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Lend A book</h2>
                    {{--                    <ul class="nav navbar-right panel_toolbox">--}}
                    {{--                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>--}}
                    {{--                        </li>--}}
                    {{--                        <li class="dropdown">--}}
                    {{--                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"--}}
                    {{--                               aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
                    {{--                            <ul class="dropdown-menu" role="menu">--}}
                    {{--                                <li><a href="#">Settings 1</a>--}}
                    {{--                                </li>--}}
                    {{--                                <li><a href="#">Settings 2</a>--}}
                    {{--                                </li>--}}
                    {{--                            </ul>--}}
                    {{--                        </li>--}}
                    {{--                    </ul>--}}
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left"
                          novalidate="" action="{{route('lends.store')}}" method="POSt">

                        @csrf

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="book_id">Book <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="book_id" id="book_id" class="form-control" required>
                                    <option value="">Choose a book</option>
                                    @foreach(\App\Book::all() as $book)
                                        <option value="{{$book->id}}">{{$book->name}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('book_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('book_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_id">User <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="user_id" id="user_id" class="form-control" required>
                                    <option value="">Choose User</option>
                                    @foreach(\App\User::whereIsAdmin(0)->get() as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('user_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Lend</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop