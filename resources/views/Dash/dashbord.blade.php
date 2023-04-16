@extends('app')

@section('content')
    <div class="row">
        <div class="container pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa-solid fa-bag-shopping fa-3x text-warning"></i>
                        <div class="ms-3">
                            <p class="mb-2">Product</p>
                            <h6 class="mb-0">{{ $Product }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa-solid fa-users fa-3x text-warning"></i>
                        <div class="ms-3">
                            <p class="mb-2">All Pharmacist</p>
                            <h6 class="mb-0">{{ $admin }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa-solid fa-users fa-3x text-warning"></i>
                        <div class="ms-3">
                            <p class="mb-2">All Buyer</p>
                            <h6 class="mb-0">{{ $user }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h4 class="card-title text-warning">All Product</h4>
                </div>
                <div class="table-responsive">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Nome Product</th>
                                <th>Stock</th>
                                <th>The remaining quantity</th>
                                <th>number of sales</th>
                                <th>income</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Product1 as $key => $info)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="{{ $info->image }}" width='60' height='60'
                                            class="rounded-circle img img-responsive" alt=""></td>
                                    <td>{{ $info->Name }}</td>
                                    <td>{{ $info->Quantité_O }}</td>
                                    <td>{{ $info->Quantity }}</td>
                                    <td>{{ $info->Quantité_O - intval($info->Quantity) }}</td>
                                    @if ($info->Sold == 0)
                                        <td>${{ ($info->Quantité_O - intval($info->Quantity)) * $info->Price }}</td>
                                    @else
                                        <td>${{ ($info->Quantité_O - intval($info->Quantity)) * $info->Sold }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
