@extends('layouts.app')

@section('content')



    <!-- Icons Grid -->


    <!-- Image Showcases -->
    <section class="showcase" >
        <div class="container-fluid pt-5" style="height: 80vh">

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


                    <div class="row my-4">
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


@endsection
