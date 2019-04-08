@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Books</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="{{route('lends.create')}}" class="btn btn-primary"><i
                                        class="fa fa-plus-circle"></i> Lend a book</a>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Member Name</th>
                            <th>Member Contact Number</th>
                            <th>Book Name</th>
                            <th>Paid</th>
                            <th>Status</th>
                            <th>Lend Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($lends as $lend)
                            <tr>
                                <td>{{$lend->id}}</td>
                                <td>{{$lend->user->name}}</td>
                                <td>{{$lend->user->phone}}</td>
                                <td>{{$lend->book->name}}</td>
                                <td>{{$lend->paid+$lend->fine}}</td>
                                <td>{!! $lend->getStatusHtml() !!}</td>
                                <td>{{\Carbon\Carbon::parse($lend->created_at)->format('M d y h:i A')}}</td>
                                <td>
                                    @if($lend->status==1)
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                    data-toggle="dropdown">
                                                <span class="caret"></span></button>
                                            <ul class="dropdown-menu dropdown-menu-left">
                                                <li>
                                                    <a href="{{route('lend.actions.summary',[1,$lend->id])}}"
                                                       onclick="return confirm('Are you sure?')">RETURN</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('lend.actions.summary',[0,$lend->id])}}"
                                                       onclick="return confirm('Are you sure?')">LOST</a>
                                                </li>
                                                {{--<li><a href="javascript:void(0)" class="edit-lend">EDIT</a></li>--}}
                                                {{--<li><a href="javascript:void(0)" class="delete-lend">DELETE</a></li>--}}
                                            </ul>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="col-md-12 text-right">
                        {!! $lends->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop