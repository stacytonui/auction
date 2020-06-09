@extends('layouts.app')

@section('content')



    <!-- Icons Grid -->
    <!-- Image Showcases -->
    <section class="showcase">
        <div class="container-fluid pt-5">

            <div class="row">

                <div class="col-lg-3 ">

                    <h4 class="my-4">Categories</h4>
                    <div class="list-group">
                        @foreach($categories as $category)
                            <a href="/category/{{ $category->id }}" class="list-group-item">{{ $category->name }}</a>
                        @endforeach
                    </div>

                </div>
                <!-- /.col-lg-3 -->

                <div class="col-lg-9 p-5 border-left border-bottom">

                    <div class="row">

                        <div class="col-md-6">

                            <img class="img-fluid" src="/storage/{{ $auction->image }}">
                        </div>
                        <div class="col-md-6">
                            <h4 class="text-center">{{$auction->name}}</h4>
                            <h6 class="text-uppercase text-muted">Auction Details</h6>
                            <p><strong>Auction Date:</strong> {{$auction->date}} </p>
                            <p><strong>Time:</strong> {{ $auction->time  }}<span> <strong class="text-danger"> | {{\Carbon\Carbon::parse($auction->date)->diffForHumans()}}</strong></span></p>
                            <p><strong>Location:</strong> {{$auction->location}}</p>
                            <p><strong>Building/Street:</strong> {{$auction->building}}</p>
                            <h6 class="text-uppercase text-muted">Contact the auctioneer</h6>
                            <p><strong>Name:</strong> {{$user->name}} </p>
                            <p><strong> Tel <i class="fa fa-phone"></i>: </strong> <a href="tel:{{$user->phone}}" > {{$user->phone}}
                                  </a></p>
                            <p><strong>Email <i class="fa fa-envelope"></i>:</strong><a href="mail:{{$user->email}}" > {{$user->email}}</a></p>


                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                    <form>
                                        <div class="form-control"></div>
                                    </form>
                            @endguest

                        </div>

                    </div>
                <!-- /.row -->

                </div>
                <!-- /.col-lg-9 -->

            </div>
        </div>
    </section>



    <!-- Testimonials -->


    <!-- Footer -->


@endsection
