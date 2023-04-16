<link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('Page_User/fonts/icomoon/style.css') }}">
<link rel="stylesheet" href="{{ asset('Page_User/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('Page_User/css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('Page_User/css/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ asset('Page_User/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('Page_User/css/owl.theme.default.min.css') }}">
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

{{-- <button type="button" class="btn btn-success" id="addsongs" href="#loginModal" data-bs-toggle="modal">Add Product</button> --}}

<div class="modal fade mt-5" id="loginModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <input type="hidden" id="task-idd4" name="idd4">
                <h5 class="modal-title text-danger">Delet Product</h5>
                <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
            </div>
            <input type="hidden" id="task-id1" name="idd1">
            <div style="margin-left:4cm; margin-top:0.5cm; margin-bottom:0.5cm">
                <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                <button type="submit" name="saveedit" class="btn btn-primary task-action-btn"
                    id="task-save-btn">confirm</button>
            </div>
        </div>
    </div>
</div>

@if (session('openLogin'))
    <script>
        $(document).ready(function() {
            $('#loginModal').modal('show');
        });
    </script>
@endif
