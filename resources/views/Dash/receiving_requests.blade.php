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
                                        <th>Quantity</th>
                                        <th>Product Price</th>
                                        <th>Shipping Price</th>
                                        <th>Total Price</th>
                                        <th>Address</th>
                                        <th>Mobile</th>
                                        <th>Status</th>
                                        <th>download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Receiving as $key => $Rec)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $Rec->First }} {{ $Rec->Last }}</td>
                                            <td>{{ $Rec->Name }}</td>
                                            <td>{{ $Rec->created_at }}</td>
                                            @if ($Rec->Status == 'false')
                                                <td style="color: #e1f221bc; font-weight:bold">Processing</td>
                                            @elseif ($Rec->Status == 'true')
                                                <td style="color: #00ff48; font-weight:bold">Shipped</td>
                                            @else
                                                <td style="color: #ff0000; font-weight:bold">refuse</td>
                                            @endif
                                            <td>{{ $Rec->Quantity }}</td>
                                            @if ($Rec->Sold == 0)
                                                <td>${{ $Rec->Price }}</td>
                                            @else
                                                <td>${{ $Rec->Sold }}</td>
                                            @endif
                                            <td>$20</td>
                                            @if ($Rec->Sold == 0)
                                                <td>${{ $Rec->Price + 20 }}</td>
                                            @else
                                                <td>${{ $Rec->Sold + 20 }}</td>
                                            @endif
                                            <td>{{ $Rec->Address }}</td>
                                            <td>{{ $Rec->Num_tele }}</td>
                                            <td >
                                                <a href="{{ route('remove_receiving_requests', $Rec->id) }}" type="submit"
                                                    class="shop-tooltip close float-none text-danger" title=""
                                                    data-original-title="Remove">×</a>
                                                <a href="{{ route('Cn_receiving_requests', $Rec->id) }}"
                                                    class="shop-tooltip close float-none text-success" title=""
                                                    data-original-title="Remove"><i class="bi bi-cart-check-fill"></i></a>
                                            </td>
                                            <td>pdf</td>
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
