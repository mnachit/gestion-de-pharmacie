@extends('home')

@section('content1')


<div class="site-blocks-cover" style="background-image: url('Page_User/images/hero_1.jpg');">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
          <div class="site-block-cover-content text-center">
            <h2 class="sub-title">Effective Medicine, New Medicine Everyday</h2>
            <h1>Welcome To Pharma</h1>
            <p>
              <a href="{{url('/Shop')}}" class="btn btn-primary px-5 py-3">Shop Now</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      
    </div>
  </div>

  
  <div class="site-section bg-light">
    <div class="container">
      <div class="row">
        <div class="title-section text-center col-12">
          <h2 class="text-uppercase">New Products</h2>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12 block-3 products-wrap">
          <div class="nonloop-block-3 d-flex justify-content-around">
            @foreach ($Data_Shop1 as $datta)
            
            <div class="col-sm-6 col-lg-4 text-center item mb-4">
            <a href="{{ route('shop-single',$datta->id)}}"> <img src="{{$datta->image}}" alt="Image" style="border-radius: 50%; width: 270px; height: 370px;"></a>
            
            <h3 class="text-dark"><a href="{{ route('shop-single',$datta->id)}}">{{$datta->Name}}</a></h3>
            @if($datta->Sold == 0)
            <p class="price"><del>{{$datta->Price}}</p>
            @else
            <p class="price"><del>${{$datta->Price}}</del> &mdash; ${{$datta->Sold}}</p>
            @endif
          </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-12 text-center">
          <a href="{{url('/Shop')}}" class="btn btn-primary px-4 py-3">View All Products</a>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="title-section text-center col-12">
          <h2 class="text-uppercase">Testimonials</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 block-3 products-wrap">
          <div class="nonloop-block-3 no-direction owl-carousel">
      
            <div class="testimony">
              <blockquote>
                <img src="Page_User/images/person_1.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat unde.&rdquo;</p>
              </blockquote>

              <p>&mdash; Kelly Holmes</p>
            </div>
      
            <div class="testimony">
              <blockquote>
                <img src="Page_User/images/person_2.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore
                  obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat
                  unde.&rdquo;</p>
              </blockquote>
            
              <p>&mdash; Rebecca Morando</p>
            </div>
      
            <div class="testimony">
              <blockquote>
                <img src="Page_User/images/person_3.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore
                  obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat
                  unde.&rdquo;</p>
              </blockquote>
            
              <p>&mdash; Lucas Gallone</p>
            </div>
      
            <div class="testimony">
              <blockquote>
                <img src="Page_User/images/person_4.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore
                  obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat
                  unde.&rdquo;</p>
              </blockquote>
            
              <p>&mdash; Andrew Neel</p>
            </div>
      
          </div>
        </div>
      </div>
    </div>
  </div> -->
  @endsection