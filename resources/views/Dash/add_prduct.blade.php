@extends('app')

@section('content')
    <div class="row">
        <div class="container pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa-solid fa-bag-shopping fa-3x text-warning"></i>
                        <div class="ms-3">
                            <p class="mb-2">Product</p>
                            <h6 class="mb-0"></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa-solid fa-users fa-3x text-warning"></i>
                        <div class="ms-3">
                            <p class="mb-2">All Pharmacist</p>
                            <h6 class="mb-0"></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa-solid fa-users fa-3x text-warning"></i>
                        <div class="ms-3">
                            <p class="mb-2">All Buyer</p>
                            <h6 class="mb-0"></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h4 class="card-title text-warning">Basic Table</h4>
                        <button type="button" class="btn btn-success" id="addsongs" href="#modal-task2"
                            data-bs-toggle="modal">Add Product</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Date</th>
                                    <th>Nome Product</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Sold</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Data_Product as $info)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ $info->image }}" width='60' height='60'
                                                class="rounded-circle img img-responsive" alt=""></td>
                                        <td>{{ $info->date }}</td>
                                        <td>{{ $info->Name }}</td>
                                        <td>{{ $info->Description }}</td>
                                        <td>{{ $info->Price }}</td>
                                        <td>{{ $info->Sold }}</td>
                                        <td>{{ $info->Quantity }}</td>
                                        <td>
                                            <div class="d-flex flex-row">
                                                <button class="rounded updateBtn me-3" data-bs-toggle="modal"
                                                    data-bs-target="#modal-edit"
                                                    style="background-color: rgb(140, 147, 169);">
                                                    <i id="{{ $info->id }}" class="bi bi-pencil-square"
                                                        style="color:rgb(255, 255, 255));"></i>
                                                </button>
                                                <form action="{{ route('destroy', $info->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-xs btn-danger btn-flat show_confirm"
                                                        data-toggle="tooltip" title='Delete'>Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @extends('Dash.model')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>

    <script>
        const updateBtns = document.querySelectorAll('.updateBtn')
        updateBtns.forEach(btn => btn.addEventListener('click', (e) => {
            let id = e.target.id
            console.log(id);
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "Update_Product/" + id, true);
            xhr.send();

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    let data = JSON.parse(xhr.responseText);
                    console.log(data);
                    document.getElementById('id_Product1').value = data.id;
                    document.getElementById('Date_P_id1').value = data.date;
                    document.getElementById('img').src = data.image;
                    document.getElementById('Nome_P_id1').value = data.Name;
                    document.getElementById('Description_P_id1').value = data.Description;
                    document.getElementById('Price_P_id1').value = data.Price;
                    document.getElementById('Sold_P_id1').value = data.Sold;
                    document.getElementById('Quantity_P_id1').value = data.Quantity;

                }
            };
        }))
    </script>
    <script
    src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
