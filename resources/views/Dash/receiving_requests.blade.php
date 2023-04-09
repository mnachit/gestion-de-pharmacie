@extends('app')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h4 class="card-title text-warning">Customer Order Tracking</h4>
            </div>
            <div class="table-responsive">
                <div class="row">
                    <div class="container">
                        <h2>Customer Order Tracking</h2>
                        <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Product Name</th>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Product Price</th>
                            <th>Shipping Price</th>
                            <th>Total Price</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>001</td>
                            <td>John Smith</td>
                            <td>Doliprane</td>
                            <td>2023-04-01</td>
                            <td>Processing</td>
                            <td>$20</td>
                            <td>$5</td>
                            <td>$25</td>
                            <td>123 Main St</td>
                            <td>555-123-4567</td>
                            <td class="d-flex justify-content-around font-weight-bold">
                                <a href="" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</a>
                                <a href="" class="shop-tooltip close float-none text-success" title="" data-original-title="Remove"><i class="bi bi-cart-check-fill"></i></a>
                            </td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection