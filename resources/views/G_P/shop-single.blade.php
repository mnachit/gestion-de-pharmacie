@extends('home')

@section('content1')

<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="/index">Home</a> <span class="mx-2 mb-0">/</span> <a
            href="/Shop">Store</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">{{$shop_single->Name}}</strong></div>
      </div>
    </div>
  </div>

@if(session()->has('message11'))
<div class="alert alert-success text-center float-right" role="alert">
    <strong>Success!</strong> This alert box indicates a successful or positive action.
</div>
@endif
@if(session()->has('message1'))
<div class="alert alert-danger text-center float-right" role="alert">
    <strong>Sory!</strong> Product already exists in the panier.
</div>
@endif
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-5 mr-auto">
                <div class="border text-center">
                    <img src="{{ asset('img/blogs/'.$shop_single->image) }}" alt="Image" class="img-fluid p-5">
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="text-black">{{$shop_single->Name}}</h2>
                <p>{{$shop_single->Description}}</p>
                <p><del>{{$shop_single->Price}}</del>  <strong class="text-primary h4">{{$shop_single->Sold}}</strong></p>
                <div class="mb-5">
                    <div class="input-group mb-3" style="max-width: 220px;">
                        {{-- <div class="input-group-prepend">
                            <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div> --}}
                        {{-- <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1"> --}}
                        {{-- <div class="input-group-append">
                            <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div> --}}
                    </div>
  
                </div>
                <p><a href="{{ route('carte',$shop_single->id)}}" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Add To Cart</a></p>
            </div>
        </div>
    </div>
</div>
@endsection