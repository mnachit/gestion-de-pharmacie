<!DOCTYPE html>
<html>

<head>
    <title>Phama-nachit Invoice</title>
    <style type="text/css">
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 1em;
            font-size: 1em;
            font-family: Arial, Helvetica, sans-serif;
        }

        table th,
        table td {
            border: 1px solid black;
            padding: 0.5em;
            text-align: left;
        }

        .qrcode {
            display: inline-block;
            padding: 10px;
            border: 1px solid #ccc;
        }

        table th {
            background-color: #e9ecef;
            font-weight: bold;
        }

        h1 {
            font-size: 2em;
            font-family: Arial, Helvetica, sans-serif;
        }

        p {
            margin-top: 0;
            font-size: 1em;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <h1>Pharma-nachit</h1>
    <p>Thank you for your purchase. Here are the details of your order:</p>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Product Name</th>
                <th>Product Name</th>
                <th>Status</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
                {{-- <th>QR Code</th> --}}
            </tr>
        </thead>
        <tbody>
            @php
                $Total = 0;
            @endphp
            @foreach ($order as $key => $data)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td><img src="{{ $data->image }}" alt=""
                            style="border-radius: 50%; width: 100px; height: 100px;"></td>
                    <td>{{ $data->Name }}</td>
                    @if ($data->Status == 'false')
                        <td style="color: #e1f221bc; font-weight:bold">Processing</td>
                    @elseif ($data->Status == 'true')
                        <td style="color: #00ff48; font-weight:bold">Shipped</td>
                    @else
                        <td style="color: #ff0000; font-weight:bold">refuse</td>
                    @endif
                    <td>{{ $data->Quantity }}</td>
                    @if ($data->Sold == 0)
                        <td>${{ $data->Price }}</td>
                    @else
                        <td>${{ $data->Sold }}</td>
                    @endif
                    @if ($data->Sold == 0)
                        <td>${{ $data->Price * $data->Quantity }}</td>
                        @php
                            $Total += $data->Price * $data->Quantity;
                        @endphp
                    @else
                        <td>${{ $data->Sold * $data->Quantity }}</td>
                        @php
                            $Total += $data->Sold * $data->Quantity;
                        @endphp
                    @endif
                    {{-- <td>
                        <div>
                            {!! QrCode::size(300)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-9') !!}
                        </div>
                    </td> --}}

                </tr>
            @endforeach
            <tr>
                <td colspan="6" style="text-align:left;  font-weight:bold">Shipping</td>
                <td>${{ $data->Shipping }}</td>
            </tr>
            <tr>
                <td colspan="6" style="text-align:left;  font-weight:bold">Total</td>
                <td>${{ $Total + $data->Shipping }}</td>
            </tr>
        </tbody>
    </table>
    <p>Thank you for choosing Phama-nachit. If you have any questions or concerns about your order, please don't
        hesitate to contact us:</p>
    <p>Address: École YOUCODE, Youssoufia</p>
    <p>Phone: +2 392 3929 210</p>
    <p>email: nachitmed71@gmail.com</p>
</body>

</html>


{{-- {!! QrCode::size(300)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-9') !!} --}}