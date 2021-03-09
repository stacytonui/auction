@extends('layouts.admin')

@section('content')
    <h3 class="text-uppercase text-muted text-center">Auction</h3>
    @if(session()->has('success_msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success_msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif


                    <div class="row">

                        <div class="col-md-6">

                            <img class="img-fluid" src="/storage/{{ $auction->image }}">
                        </div>
                        <div class="col-md-6">
                            <h4 class="text-center">{{$auction->name}}</h4>
                            <h6 class="text-uppercase text-muted">Auction Details</h6>
                            <p><strong>Auction Date:</strong> {{$auction->date}} </p>
                            <p><strong>Auction Date:</strong> {{$highest_bidder->name ?? '' }} </p>
                            <p><strong>Time:</strong> {{ $auction->time  }}<span> <strong class="text-danger"> | {{\Carbon\Carbon::parse($auction->date)->diffForHumans()}}</strong></span></p>
                            <p><strong>Starting Price:</strong> KES {{$auction->starting_price}}</p>
                            @if(session()->has('success_msg'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session()->get('success_msg') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            @endif
                            <p><strong>Current Price:</strong> {{$auction->current_price}}</p>
                            <h6 class="text-uppercase text-muted">Contact the auctioneer</h6>
                            <p><strong>Name:</strong> {{$user->name}} </p>
                            <p><strong> Tel <i class="fa fa-phone"></i>: </strong> <a href="tel:{{$user->phone}}" > {{$user->phone}}
                                  </a></p>
                            <p><strong>Email <i class="fa fa-envelope"></i>:</strong><a href="mail:{{$user->email}}" > {{$user->email}}</a></p>


                            @guest
                                <div class="row">

                                    <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    <span class="px-1"> or</span>

                                @if (Route::has('register'))

                                        <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        <span class="px-1"> to place a bid</span>
                                @endif
                                </div>
                            @else
                                <form action="/place_bid" method="post">
                                    @csrf
                                <div class="form-group row">
                                    @if(session()->has('error_msg'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session()->get('error_msg') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                    @endif

                                     <input type="hidden" value="{{ $auction->id}}" name="id">

                                    <div class="col-md-6">
                                        <input id="bid" type="bid" class="form-control @error('bid') is-invalid @enderror" name="bid" required autocomplete="current-bid">

                                        @error('bid')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-primary">Place Bid</button>


                                    </div>
                                </div>
                                </form>
                            @endguest

                        </div>

                    </div>

                <!-- /.row -->





    <!-- Testimonials -->


    <!-- Footer -->


@endsection
