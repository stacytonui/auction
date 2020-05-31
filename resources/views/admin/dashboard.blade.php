@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">All My Auctions</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">No of Active Auctions</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count }}</div>
                            </div>
                            <div class="col-auto">

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <!-- Content Row -->

        </div>


            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Profile</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="https://image.flaticon.com/icons/png/512/17/17004.png" alt="">

                    <p><strong>Name:</strong> {{$user->name}} </p>
                    <p><strong> Tel <i class="fa fa-phone"></i>: </strong> <a href="tel:{{$user->phone}}" > {{$user->phone}}
                        </a></p>
                        <p><strong>Email <i class="fa fa-envelope"></i>:</strong><a href="mail:{{$user->email}}" > {{$user->email}}</a></p>
                        <p><strong>Location <i class="fa fa-location-arrow"></i>:</strong> {{$user->location}}</p>
                    <a href="/edit_profile/{{ $user->id }}" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
    </div>


@endsection
