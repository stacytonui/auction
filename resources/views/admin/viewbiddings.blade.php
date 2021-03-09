@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-body">
            @if(session()->has('success_msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success_msg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
                <table class="table table-hover table-bordered responsive" id="sampleTable">
                    <thead>
                    <tr>
                        <th class="text-center"> Name </th>
                        <th class="text-center"> Amount </th>
                        <th class="text-center"> Phone Number </th>
                        <th class="text-center"> Email </th>

                        <th class="text-center"> Date </th>
                        <th class="text-center"> Time </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($biddings as $bidding)
                        <tr>
                            <td class="text-center">{{ $bidding->user->name }}</td>
                            <td class="text-center">{{ $bidding->amount }}</td>
                            <td class="text-center">{{ $bidding->user->phone }}</td>
                            <td class="text-center">{{ $bidding->user->email }}</td>
                            <td class="text-center">{{ $bidding->created_at->todatestring()}}</td>
                            <td class="text-center">{{ $bidding->created_at->totimestring()}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>

@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
