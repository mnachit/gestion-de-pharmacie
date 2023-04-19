@extends('home')

<style>
    .search-wrapper {
        position: absolute;
        transform: translate(-50%, -50%);
        /* top: 10%; */
        left: 100%;
        /* position: left; */
        margin-top: -0.5cm;
        /* position: absolute; */
        position: absolute;
        /* right: 4000px; */
    }

    .search-wrapper.active {}

    .search-wrapper .input-holder {
        height: 70px;
        width: 70px;
        overflow: hidden;
        background: rgba(0, 0, 0, 0);
        border-radius: 6px;
        position: relative;
        transition: all 0.3s ease-in-out;
    }

    .search-wrapper.active .input-holder {
        width: 450px;
        border-radius: 50px;
        background: rgba(27, 235, 231, 0.5);
        transition: all .5s cubic-bezier(0.000, 0.105, 0.035, 1.570);
    }

    .search-wrapper .input-holder .search-input {
        width: 100%;
        height: 50px;
        padding: 0px 70px 0 20px;
        opacity: 0;
        position: absolute;
        top: 0px;
        left: 0px;
        background: transparent;
        box-sizing: border-box;
        border: none;
        outline: none;
        font-family: "Open Sans", Arial, Verdana;
        font-size: 16px;
        font-weight: 400;
        line-height: 20px;
        color: #000000;
        transform: translate(0, 60px);
        transition: all .3s cubic-bezier(0.000, 0.105, 0.035, 1.570);
        transition-delay: 0.3s;
    }

    .search-wrapper.active .input-holder .search-input {
        opacity: 1;
        transform: translate(0, 10px);
    }

    .search-wrapper .input-holder .search-icon {
        width: 70px;
        height: 70px;
        border: none;
        border-radius: 6px;
        background: #FFF;
        padding: 0px;
        outline: none;
        position: relative;
        z-index: 2;
        float: right;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    .search-wrapper.active .input-holder .search-icon {
        width: 50px;
        height: 50px;
        margin: 10px;
        border-radius: 30px;
    }

    .search-wrapper .input-holder .search-icon span {
        width: 22px;
        height: 22px;
        display: inline-block;
        vertical-align: middle;
        position: relative;
        transform: rotate(45deg);
        transition: all .4s cubic-bezier(0.650, -0.600, 0.240, 1.650);
    }

    .search-wrapper.active .input-holder .search-icon span {
        transform: rotate(-45deg);
    }

    .search-wrapper .input-holder .search-icon span::before,
    .search-wrapper .input-holder .search-icon span::after {
        position: absolute;
        content: '';
    }

    .search-wrapper .input-holder .search-icon span::before {
        width: 4px;
        height: 11px;
        left: 9px;
        top: 18px;
        border-radius: 2px;
        background: rgb(0, 0, 0);
    }

    .search-wrapper .input-holder .search-icon span::after {
        width: 14px;
        height: 14px;
        left: 0px;
        top: 0px;
        border-radius: 16px;
        border: 4px solid rgb(0, 0, 0);
    }

    .search-wrapper .close {
        position: absolute;
        z-index: 1;
        top: 24px;
        right: 20px;
        width: 25px;
        height: 25px;
        cursor: pointer;
        transform: rotate(-180deg);
        transition: all .3s cubic-bezier(0.285, -0.450, 0.935, 0.110);
        transition-delay: 0.2s;
    }

    .search-wrapper.active .close {
        right: -50px;
        transform: rotate(45deg);
        transition: all .6s cubic-bezier(0.000, 0.105, 0.035, 1.570);
        transition-delay: 0.5s;
    }

    .search-wrapper .close::before,
    .search-wrapper .close::after {
        position: absolute;
        content: '';
        background: rgb(0, 0, 0);
        border-radius: 2px;
    }

    .search-wrapper .close::before {
        width: 5px;
        height: 25px;
        left: 10px;
        top: 0px;
    }

    .search-wrapper .close::after {
        width: 25px;
        height: 5px;
        left: 0px;
        top: 10px;
    }
</style>
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
                        {{-- <input type="text" class="form-control form-input" placeholder="Search anything..."
                            id="searchbar" onkeyup="searche()"> --}}
                        <div class="search-wrapper ">
                            <div class="input-holder ">
                                <input type="text" class="search-input" placeholder="Type to search" onkeyup="searche()"
                                    id="searchbar" />
                                <button class="search-icon" onclick="searchToggle(this, event);"><span></span></button>
                            </div>
                            <span class="close" onclick="searchToggle(this, event);"></span>
                        </div>
                        <span class="left-pan"><i class="fa fa-microphone"></i></span>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($Data_Shop as $show)
                    <div class="col-sm-6 col-lg-4 text-center item mb-4">
                        <a href="{{ route('shop-single', $show->id) }}"> <img src="{{ $show->image }}" alt="Image"
                                style="border-radius: 50%; width: 270px; height: 370px;"></a>
                        <h3 class="text-dark"><a href="{{ route('shop-single', $show->id) }}"
                                id="titlee_">{{ $show->Name }}</a></h3>
                        @if ($show->Sold == 0)
                            <p class="price"><del>{{ $show->Price }}</p>
                        @else
                            <p class="price"><del>${{ $show->Price }}</del> &mdash; ${{ $show->Sold }}</p>
                        @endif
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
                container.insertBefore(item, container.querySelector('.item:nth-of-type(' + (data.indexOf(title
                    .textContent) + 1) + ')'));
            }

        }
    </script>
    <script>
        function searchToggle(obj, evt) {
            var container = $(obj).closest('.search-wrapper');
            if (!container.hasClass('active')) {
                container.addClass('active');
                evt.preventDefault();
            } else if (container.hasClass('active') && $(obj).closest('.input-holder').length == 0) {
                container.removeClass('active');
                // clear input
                container.find('.search-input').val('');
            }
        }
    </script>
@endsection
