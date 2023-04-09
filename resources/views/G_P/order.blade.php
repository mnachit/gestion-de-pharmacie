@extends('home')

@section('content1')

<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="/index">Home</a> <a
            href="/Shop"></a> <span class="mx-2 mb-0">/</span> <strong class="text-black">order tracking</strong></div>
      </div>
    </div>
</div>

<div class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">order tracking</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Price</th>
                        <th scope="col">Date</th>
                        <th scope="col">Shipping</th>
                        <th scope="col">Address</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td class="fw-bold text-success">Shipped</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection