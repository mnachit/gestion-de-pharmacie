@extends('home')

@section('content1')
<style>
    .comet-checkbox-circle {
  display: inline-block;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  border: 2px solid black;
}

    .ui-w-40 {
    width: 40px !important;
    height: auto;
}

.card{
    box-shadow: 0 1px 15px 1px rgba(52,40,104,.08);    
}

.ui-product-color {
    display: inline-block;
    overflow: hidden;
    margin: .144em;
    width: .875rem;
    height: .875rem;
    border-radius: 10rem;
    -webkit-box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
    box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
    vertical-align: middle;
}
</style>
<div class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h2>Shopping Cart</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered m-0">
                <thead>
                  <tr>
                    <!-- Set columns width -->
                    <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Sold</th>
                    <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                    <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($Carte as $Cartes)
                        <tr>
                            <td class="p-4">
                            <div class="media align-items-center">
                                <input class="form-check-input w-5 updateBtn el" type="checkbox" id={{$Cartes->id}}>
                                {{-- <span class="comet-checkbox-circle" id="{{$Cartes->id}}"></span> --}}
                                <img src="{{ asset('img/blogs/'. $Cartes->image)}}" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                                <div class="media-body">
                                <a href="#" class="d-block text-dark">{{$Cartes->Name}}</a>
                                </div>
                            </div>
                            </td>
                            @if ($Cartes->Sold == 0)
                            <td class="text-right font-weight-semibold align-middle p-4">${{$Cartes->Price}}</td>
                            @else
                            <td class="text-right font-weight-semibold align-middle p-4"><del>${{$Cartes->Price}}</del></td>
                            @endif
                            <td class="text-right font-weight-semibold align-middle p-4">${{$Cartes->Sold}}</td>
                            <td class="align-middle p-4"><input type="text" class="form-control text-center" value="2"></td>
                            <td class="text-right font-weight-semibold align-middle p-4">$115.1</td>
                            <td class="text-center align-middle px-0"><a href="/DeletePr/{{$Cartes->id}}" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</a></td>
                        </tr>
                    @endforeach
        
                </tbody>
              </table>
            </div>
        
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
              <div class="mt-4">
                <label class="text-muted font-weight-normal">Promocode</label>
                <input type="text" placeholder="ABC" class="form-control">
              </div>
              <div class="d-flex">
                <div class="text-right mt-4 mr-5">
                  <label class="text-muted font-weight-normal m-0">Shipping</label>
                  <div class="text-large"><strong>$20</strong></div>
                </div>
                <div class="text-right mt-4">
                  <label class="text-muted font-weight-normal m-0">Total price</label>
                  
                  <div class="text-large" id="Prix">0</div>
                  {{-- @endforeach --}}
                </div>
              </div>
            </div>
        
            <div class="float-right">
              <a href="/Shop" type="submit" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to shopping</a>
              @if (Auth::user()->Address == ' ')
              <a href="#modal-C" data-bs-toggle="modal" type="submit" class="btn btn-lg btn-primary mt-2">Checkout</a>
              @else
              <a onclick="checkCheckbox()" type="submit" class="btn btn-lg btn-primary mt-2">Checkout</a>
              @endif
            </div>
        
          </div>
      </div>
  </div>

  <div class="modal fade mt-5" id="modal-C">
    <div class="modal-dialog" style="margin-top: 7cm">
        <div class="modal-content" >
                <div class="modal-header">
                    <input type="hidden" id="task-idd4" name="idd4">
                    <h5 class="modal-title text-secondary">Please add your Address, to follow the next step</h5>
                    <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                </div>
                <input type="hidden" id="task-id1" name="idd1">
                <div style="margin-left:4cm; margin-top:0.5cm; margin-bottom:0.5cm">
                    <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                    <a type="submit" href="/Profile" class="btn btn-primary task-action-btn" id="task-save-btn">Go</a>
                </div>
        </div>
    </div>
</div>
    <script>
      function checkCheckbox() {
        const updateBtns = document.querySelectorAll('.updateBtn');
        let count = 0;
        for (let i = 0; i < updateBtns.length; i++) {
          if (updateBtns[i].checked) {
            count++;
          }
        }
        if (count > 1) {
          href="/Checkout"
        } else if (count < 1) {
          alert('Please select input element.');
        } else {
          window.location.href = "/Checkout";
        }
      }
    </script>
  <script>
    var dd=0;
    var data_array = [];
    document.getElementById('Prix').textContent = 0;
    const updateBtns = document.querySelectorAll('.updateBtn');
    updateBtns.forEach(btn => btn.addEventListener('change', (e) => {
        if(e.target.checked){
            name(e.target.id);
        }else{
          console.log(data_array);
            dd -= parseInt(data_array);
            data_array.shift();
            document.getElementById('Prix').textContent = dd;
        }
    }));
    
    function name(id) {
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "Show_Prix/" + id, true);
        xhr.send();

        xhr.onreadystatechange = function () {
            
            if (xhr.readyState === 4 && xhr.status === 200){
                let data = JSON.parse(xhr.responseText);
                console.log(data);
                // return
                data_array.push(data)
                dd += parseInt(data);
                document.getElementById('Prix').textContent = dd;
            }
        };
    };
</script>


@endsection