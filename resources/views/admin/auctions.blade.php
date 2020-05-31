@extends('layouts.admin')

@section('content')
    <h3 class="text-uppercase text-muted text-center">My Auctions</h3>
    @if(session()->has('success_msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success_msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
    <div class="row">
        @if($count<1)
            <h4>Post your first auction <a href="/post_auction">here</a> </h4><br>


        @endif


    @foreach($auctions as $auction)


        <div class="col-lg-6 mb-4">


            <!-- Illustrations -->
            <div class="card shadow mb-4">


                <div class="card-body">
                    <div class="text-center">
                        <h5 class="m-0 font-weight-bold text-uppercase">{{ $auction->name }}</h5>
                        <hr>
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="height: 200px;" src="{{ asset('storage/'.$auction->image) }}" alt="">

                    </div>
                    <div class="text-center">
                    <p><strong>Auction Date:</strong> {{$auction->date}} <strong>Time:</strong> {{ $auction->time  }}</p>
                    <p><strong>Location:</strong> {{$auction->location}}</p>
                    <a class="btn btn-primary" href="/edit_auction/{{ $auction->id }}">Edit Details</a>

                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                            Remove Auction
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                       Are you sure you want to delete the auction?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <a href="/remove_auction/{{$auction->id}}" class="btn btn-danger">Yes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Approach -->


        </div>






    @endforeach
    </div>
    {{ $auctions->links() }}
    <hr>
@endsection
