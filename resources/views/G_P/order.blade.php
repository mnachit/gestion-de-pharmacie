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

{{-- @php
  $var = DB::table('orders')
    ->whereIn(DB::raw("(product_id, user_id)"), function($query){
        $query->select(DB::raw("product_id, user_id"))
              ->from('orders')
              ->groupBy('product_id', 'user_id')
              ->havingRaw('COUNT(*) > 1');
    })
    ->get();
@endphp

{{dd($var)}} --}}

<div class="container px-3 my-5 clearfix">
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
                        <th scope="col">Id Product</th>
                        <th scope="col">Date</th>
                        <th scope="col">Address</th>
                        <th scope="col">Qantite</th>
                        {{-- <th scope="col">Status</th> --}}
                        <th scope="col">download</th>
                        <th scope="col">claim</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($Receiving as $key => $Rec)
                        <tr>
                            <th scope="row">{{$key + 1}}</th>
                            <th scope="row">#{{$Rec->id}}</th>
                            <td>{{$Rec->created_at}}</td>
                            <td>{{Auth::user()->Address}}</td>
                            <td>{{ $Rec->{'sum(Quantity)'} }}</td>
                            {{-- @if($Rec->Status == "false")
                            <td class="text-secondary">Processing</td>
                            @else
                            <td class="text-success">Shipped</td>
                            @endif --}}
                            {{-- <td><a href="/Pdf/{{$Rec->created_at}}" type="submit">pdf</a></td> --}}
                            <td><a href="/Pdf/{{$Rec->created_at}}" type="submit">pdf</a></td>
                            <td><a href="/Contact" type="submit">Contact</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection