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
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Product Price</th>
                            <th>Shipping Price</th>
                            <th>Total Price</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>001</td>
                            <td>John Smith</td>
                            <td>2023-04-01</td>
                            <td>Processing</td>
                            <td>$20</td>
                            <td>$5</td>
                            <td>$25</td>
                            <td>123 Main St</td>
                            <td>555-123-4567</td>
                            </tr>
                            <tr>
                            <td>002</td>
                            <td>Jane Doe</td>
                            <td>2023-04-02</td>
                            <td>Shipped</td>
                            <td>$35</td>
                            <td>$8</td>
                            <td>$43</td>
                            <td>456 Elm St</td>
                            <td>555-234-5678</td>
                            </tr>
                            <tr>
                            <td>003</td>
                            <td>Mark Johnson</td>
                            <td>2023-04-03</td>
                            <td>Delivered</td>
                            <td>$45</td>
                            <td>$10</td>
                            <td>$55</td>
                            <td>789 Oak St</td>
                            <td>555-345-6789</td>
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