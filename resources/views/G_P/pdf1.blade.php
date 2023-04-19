<!DOCTYPE html>
<html>

<head>
    <title>Phama-nachit Invoice</title>
    

  <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
  <link href="https://printjs-4de6.kxcdn.com/print.min.css"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
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
    <div id="idcard">
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
                    <th>QR Code</th>
                </tr>
            </thead>
            <tbody>
                {{-- @php
                $Total = 0;
            @endphp
            @foreach ($order as $key => $data) --}}
                <tr>
                    <td>13</td>
                    <td>13</td>
                    <td>13</td>
                    <td>13</td>
                    <td>13</td>
                    <td>13</td>
                    <td>13</td>
                    <td>
                        <div class="qrcode">
                            {!! QrCode::size(300)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-9') !!}
                        </div>
                    </td>

                </tr>
                {{-- @endforeach --}}
                <tr>
                    <td colspan="7" style="text-align:left;  font-weight:bold">Shipping</td>
                    <td>$2</td>
                </tr>
                <tr>
                    <td colspan="7" style="text-align:left;  font-weight:bold">Total</td>
                    <td>$2</td>
                </tr>
            </tbody>
        </table>
        <p>Thank you for choosing Phama-nachit. If you have any questions or concerns about your order, please don't
            hesitate to contact us:</p>
        <p>Address: École YOUCODE, Youssoufia</p>
        <p>Phone: +2 392 3929 210</p>
        <p>email: nachitmed71@gmail.com</p>
    </div>
    <div class="border-top">
        <div class="card-body">
            <button id="idcard11" onclick="printJS('idcard', 'html')" class="btn btn-success text-light">
                Download ID Card
            </button>
        </div>
    </div>
</body>
<script>
    function test() {
    document.getElementById("idcard11").onclick = function() {
        printJS('idcard', 'html');
    }
}
test();

</script>

</html>
