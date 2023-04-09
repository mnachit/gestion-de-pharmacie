@extends('home')

@section('content1')

<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0">
          <a href="/index">Home</a> <span class="mx-2 mb-0">/</span>
          <strong class="text-black">Store</strong>
        </div>
      </div>
    </div>
  </div>

{{-- <div class="container">
    <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="form">
                <i class="fa fa-search"></i>
                <input type="text" class="form-control form-input" placeholder="Search anything..." id="searchbar" onkeyup="searche()">
                <span class="left-pan"><i class="fa fa-microphone"></i></span>
            </div>
        </div>
    </div>
</div> --}}

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
            <div class="form">
                <i class="fa fa-search"></i>
                <input type="text" class="form-control form-input" placeholder="Search anything..." id="searchbar" onkeyup="searche()">
                <span class="left-pan"><i class="fa fa-microphone"></i></span>
            </div>
        </div>
      </div>
      
      <div class="row">
        @foreach ($Data_Shop as $show)
        <div class="col-sm-6 col-lg-4 text-center item mb-4">
          <a href="{{ route('shop-single',$show->id)}}"> <img src="{{ asset('img/blogs/'. $show->image)}}" alt="Image"></a>
          <h3 class="text-dark"><a href="{{ route('shop-single',$show->id)}}" id="titlee_">{{$show->Name}}</a></h3>
          <p class="price"><del>95.00</del> &mdash; $55.00</p>
        </div>
        @endforeach






        
      </div>
      <div class="row mt-5">
        <div class="col-md-12 text-center">
          <div class="site-block-27">
            <ul>
              <li><a href="#">&lt;</a></li>
              <li class="active"><span>1</span></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">&gt;</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  

  <script>
    function searche() {
        let input = document.getElementById('searchbar').value.toLowerCase();
        let items = document.getElementsByClassName('item');

        for (let i = 0; i < items.length; i++) {
            let title = items[i].querySelector('.text-dark a');
            if (title.innerHTML.toLowerCase().includes(input)) {
                items[i].style.display = 'block';
            } else {
                items[i].style.display = 'none';
            }
        }
    }

    function Sort(sortOrder) {
        // console.log('oui');
        // return
        let data = []
        let items = document.getElementsByClassName('item');
        console.log(items);
        for (let i = 0; i < items.length; i++) {
            let title = items[i].querySelector('.text-dark a');
            data.push(title.textContent)
        }

        // Sort the data based on sortOrder (asc/desc)
        if (sortOrder === 'az') {
        data.sort();
        } else if (sortOrder === 'za') {
        data.sort().reverse();
        }

        // Loop through the sorted data and update the DOM
        let container = document.getElementById('shop-container');
        for (let i = 0; i < data.length; i++) {
        let item = container.querySelector('.item:nth-of-type(' + (i + 1) + ')');
        let title = item.querySelector('.text-dark a');
        if (title.textContent === data[i]) {
            continue; // Skip if the item is already in the correct position
        }
        // Move the item to its new position in the DOM
        container.insertBefore(item, container.querySelector('.item:nth-of-type(' + (data.indexOf(title.textContent) + 1) + ')'));
        }

    }
  </script>
@endsection