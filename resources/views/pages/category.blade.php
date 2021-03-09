@extends('layouts.admin')

@section('content')
    <h3 class="text-uppercase text-muted text-center">{{ $category->name }}</h3>
    @if(session()->has('success_msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success_msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
    <div class="row">


                <!-- Illustrations -->
                <div class="row my-4">
                    @if($count<1)
                        <div class="text-center container">
                        <h4>No live auctions for this category. Check later.</a> </h4><br>
                        </div>

                    @endif
                    @foreach($auctions as $auction)

                        <div class="col-lg-4  mb-4">
                            <div class="card h-100">
                                <a href="/auction/{{ $auction->id }}"><img class="card-img-top" style=" height: 200px;" src="/storage/{{ $auction->image }}" alt=""></a>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="/auction/{{ $auction->id }}">{{ $auction->name }}</a>
                                    </h5>

                                    <p class="card-text">{{ $auction->location }}</p>
                                    <p class="card-text"><strong>Auction Date: </strong>{{ $auction->date }}</p>
                                    <p class="card-text">

                                        <strong class="text-danger"> {{\Carbon\Carbon::parse($auction->date)->diffForHumans()}}</strong></p>
                                </div>
                                <div class="card-footer">

                                </div>
                            </div>
                        </div>
                    @endforeach



                </div>

                <!-- Approach -->


            </div>







    {{ $auctions->links() }}
    <hr>
@endsection
