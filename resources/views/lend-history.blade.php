@extends('layouts.main')

@section('content')

    <!--============================= FEATURED PLACES =============================-->
    <section class="main-block light-bg" style="min-height: 90vh">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>My Lend Books</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Book Name</th>
                        <th>Due Date</th>
                        <th>Paid</th>
                        <th>Fine</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($lends as $lend)
                        <tr>
                            <td>{{$lend->id}}</td>
                            <td>{{$lend->book->name}}</td>
                            <td>{{\Carbon\Carbon::parse($lend->due_date)->format('M d Y h:i A')}}</td>
                            <td>Rs. {{$lend->paid}}</td>
                            <td>Rs. {{$lend->fine}}</td>
                            <td>Rs. {{$lend->paid+$lend->fine}}</td>
                            <td>{!! $lend->getStatusHtml() !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="featured-btn-wrap">
                        {!! $lends->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//END FEATURED PLACES -->
@stop