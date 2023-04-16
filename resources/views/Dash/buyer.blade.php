@extends('app')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h4 class="card-title text-warning">All Pharmacy</h4>
                </div>
                <div class="table-responsive">
                    <div class="row">
                        <div class="container">
                            <h2>Customer Order Tracking</h2>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Numero</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Admin as $key => $ADM)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$ADM->First}}</td>
                                            <td>{{$ADM->Last}}</td>
                                            <td>{{$ADM->email}}</td>
                                            <td>{{$ADM->Num_tele}}</td>
                                            <td>USER</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
