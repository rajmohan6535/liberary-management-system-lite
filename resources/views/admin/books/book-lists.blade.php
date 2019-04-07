@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Books</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="{{route('books.create')}}" class="btn btn-primary"><i
                                        class="fa fa-plus-circle"></i> Add New Book</a>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Author</th>
                            <th>Price</th>
                            <th>Lend Cost</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{$book->id}}</td>
                                <td>{{$book->name}}</td>
                                <td>{{$book->author}}</td>
                                <td>{{$book->price}}</td>
                                <td>{{$book->lend_price}}</td>
                                <td>{{$book->created_at}}</td>
                                <td>
                                    <a class="btn btn-default" href="{{route('books.edit',[$book->id])}}">EDIT</a>
                                    <a class="btn btn-default delete-book" href="javascript:void(0)"
                                       data-id="{{'book_delete_'.$book->id}}">DELETE</a>
                                    <form id="book_delete_{{$book->id}}" action="{{route('books.destroy',[$book->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="col-md-12 text-right">
                        {!! $books->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script>
        $('.delete-book').click(function () {
            let confirmData = confirm("Do you really want to delete this book from the database?");

            if (confirmData) {
                const id = $(this).data('id');
                $(`#${id}`).submit();
            } else {

            }
        })
    </script>
@stop