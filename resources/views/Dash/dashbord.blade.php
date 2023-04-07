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
                        <h6 class="mb-0"></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa-solid fa-users fa-3x text-warning"></i>
                    <div class="ms-3">
                        <p class="mb-2">All Pharmacist</p>
                        <h6 class="mb-0"></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa-solid fa-users fa-3x text-warning"></i>
                    <div class="ms-3">
                        <p class="mb-2">All Buyer</p>
                        <h6 class="mb-0"></h6>
                    </div> 
                </div> 
            </div> 
        </div> 
    </div>

@endsection