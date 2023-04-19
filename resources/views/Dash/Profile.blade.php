@extends('app')

@section('content')
<style>
    /* #test{
    background: rgb(99, 39, 120)
} */
    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8
    }

    .profile-button {
        background: rgb(99, 39, 120);
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: #682773
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none
    }

    .back:hover {
        color: #682773;
        cursor: pointer
    }

    .labels {
        font-size: 11px
    }

    .add-experience:hover {
        background: #BA68C8;
        color: #fff;
        cursor: pointer;
        border: solid 1px #BA68C8
    }
</style>


<div class="container rounded bg-white mt-5 mb-5" id="test">
    <form action="/Update-Profile1/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px" src="{{ Auth::user()->image }}"><span class="font-weight-bold">Edogaru</span><span
                        class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
                <input type="file" name="image_profile">
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    @csrf
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">First</label><input type="text"
                                class="form-control" placeholder="first name" value="{{ Auth::user()->First }}"
                                name="first" required></div>
                        <div class="col-md-6"><label class="labels">Last</label><input type="text"
                                class="form-control" placeholder="last name" value="{{ Auth::user()->Last }}"
                                name="last" required></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input type="tel"
                                class="form-control" placeholder="enter phone number"
                                value="{{ Auth::user()->Num_tele }}" name="num" required></div>
                        <div class="col-md-12"><label class="labels">Address Line </label><input type="text"
                                class="form-control" placeholder="enter address line 1"
                                value="{{ Auth::user()->Address }}" name="address" required></div>
                        <div class="col-md-12"><label class="labels">Postcode</label><input type="text"
                                class="form-control" placeholder="enter Postcode" value="{{ Auth::user()->Postcode }}"
                                name="post" required></div>
                        <div class="col-md-12"><label class="labels">Email</label><input type="email"
                                class="form-control" placeholder="enter" value="{{ Auth::user()->email }}"
                                name="email" required></div>
                        <div class="col-md-12"><label class="labels">Password</label><input type="password"
                                class="form-control" placeholder="enter new password" value="" name="password" >
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Country</label><input type="text"
                                class="form-control" placeholder="country" value="{{ Auth::user()->Country }}"
                                name="country" required></div>
                        <div class="col-md-6"><label class="labels">State/Region</label><input type="text"
                                class="form-control" placeholder="state" value="{{ Auth::user()->Region }}"
                                name="state" required></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save
                            Profile</button></div>
                </div>
            </div>
        </div>
</div>
</form>
</div>
</div>
@endsection