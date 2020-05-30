@extends('layouts.app')

@section('content')

<!-- Masthead -->
<header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h1 class="mb-5">Auctioneer</h1>
                <h3 class="mb-5">Get the latest auction deals</h3>
                <form action="/search" method="post">
                    @csrf
                    <div class="form-group row">

                        <div class="col-sm-12">
                            <select class="form-control" name="category">
                                @foreach($categories as $category)
                                    <option value=" {{$category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-circle btn-primary ">Search</button>
                </form>
            </div>

        </div>
    </div>
</header>

<!-- Icons Grid -->


<!-- Image Showcases -->
<section class="showcase">
    <div class="container-fluid pt-3">

        <div class="row">

            <div class="col-lg-3">

                <h4 class="my-4">Categories</h4>
                <div class="list-group">
                    @foreach($categories as $category)
                    <a href="/category/{{ $category->id }}" class="list-group-item">{{ $category->name }}</a>
                    @endforeach
                </div>

            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">


                <div class="row">
                    @foreach($auctions as $auction)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="/auction/{{ $auction->id }}"><img class="card-img-top" style=" height: 200px;" src="/storage/{{ $auction->image }}" alt=""></a>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="/auction/{{ $auction->id }}">{{ $auction->name }}</a>
                                </h5>

                                <p class="card-text">{{ $auction->location }}</p>
                                <p class="card-text"><strong>Auction Date: </strong>{{ $auction->date }} <strong>at </strong> {{ $auction->time }}</p>
                            </div>
                            <div class="card-footer">

                            </div>
                        </div>
                    </div>
                        @endforeach



                </div>
                {{$auctions->links()}}
                <!-- /.row -->

            </div>
            <!-- /.col-lg-9 -->

        </div>
    </div>
</section>



<!-- Testimonials -->


<!-- Footer -->

<!-- Bootstrap core JavaScript -->


@endsection
