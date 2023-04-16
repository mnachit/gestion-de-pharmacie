
<div class="modal fade mt-5" id="delet">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" id="form-task">
                @csrf
                <div class="modal-header">
                    <input type="hidden" id="task-idd4" name="idd4">
                    <h5 class="modal-title text-danger">Delet Product</h5>
                    <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                </div>
                <input type="hidden" id="task-id1" name="idd1">
                <div style="margin-left:4cm; margin-top:0.5cm; margin-bottom:0.5cm">
                    <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                    <button type="submit" name="saveedit" class="btn btn-primary task-action-btn" id="task-save-btn">confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade mt-5" id="modal-task2">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('product.store') }}"  id="form-task" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title text-danger">Add Product</h5>
                    <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                </div>
                <div class="modal-body">
                    <input type="file" name="image_pro">
                </div>
                <div class="modal-body">
                    <label class="form-label">Date</label>
                    <input type="datetime-local" name="Date_P" class="form-control text-dark" style="background-color : #DDDDDD" id="Date_P_id"/>
                </div>
                <div class="modal-body">
                    <label class="form-label">Nome Product</label>
                    <input type="text" name="Nome_P" class="form-control text-dark" style="background-color : #DDDDDD" id="Nome_P_id"/>
                </div>
                <div class="modal-body">
                    <label class="form-label">Description</label>
                    <textarea name="Description_P" class="form-control text-dark" style="background-color : #DDDDDD" id="Description_P_id" ></textarea>
                </div>
                <div class="modal-body">
                    <select class="form-select" style="background-color : #DDDDDD" name="Produit">
                        <option selected>Open this select menu</option>
                        <option value="produit cosmétique">produit cosmétique</option>
                        <option value=" COMPLÉMENTS ALIMENTAIRES"> COMPLÉMENTS ALIMENTAIRES</option>
                        <option value="Accessoires et matériel médical">Accessoires et matériel médical</option>
                        <option value="Réactifs et tests">Réactifs et tests</option>
                    </select>
                </div>
                <div class="modal-body">
                    <label class="form-label">Price</label>
                    <input type="text" name="Price_P" class="form-control text-dark" style="background-color : #DDDDDD" id="Price_P_id"/>
                </div>
                <div class="modal-body">
                    <label class="form-label">Sold (option)</label>
                    <input type="number" name="Sold_P" class="form-control text-dark" style="background-color : #DDDDDD" id="Sold_P_id"/>
                </div>
                <div class="modal-body">
                    <label class="form-label">Quantity</label>
                    <input type="text" name="Quantity_P" class="form-control text-dark" style="background-color : #DDDDDD" id="Quantity_P_id"/>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                    <button type="submit" name="saveuser" class="btn btn-primary task-action-btn" id="task-save-btn1">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade mt-5" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ url('update-Product')}}"  id="form-task" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title text-danger">Update Product</h5>
                    <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                    <input type="hidden" id="id_Product1" name="id_product">
                </div>
                <div class="modal-body">
                    <img class="card-img-top rounded-circle w-50 h-50" src="" alt="..." id="img" style="margin-left:2.7cm" />
                    <input type="file" name="image_pro1">
                </div>
                <div class="modal-body">
                    <label class="form-label">Date</label>
                    <input type="datetime" name="Date_P1" class="form-control text-dark" style="background-color : #DDDDDD" id="Date_P_id1"/>
                </div>
                <div class="modal-body">
                    <label class="form-label">Nome Product</label>
                    <input type="text" name="Nome_P1" class="form-control text-dark" style="background-color : #DDDDDD" id="Nome_P_id1"/>
                </div>
                <div class="modal-body">
                    <label class="form-label">Description</label>
                    <textarea name="Description_P1" class="form-control text-dark" style="background-color : #DDDDDD" id="Description_P_id1" ></textarea>
                </div>
                <div class="modal-body">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="modal-body">
                    <label class="form-label">Price</label>
                    <input type="text" name="Price_P1" class="form-control text-dark" style="background-color : #DDDDDD" id="Price_P_id1"/>
                </div>
                <div class="modal-body">
                    <label class="form-label">Sold (option)</label>
                    <input type="text" name="Sold_P1" class="form-control text-dark" style="background-color : #DDDDDD" id="Sold_P_id1"/>
                </div>
                <div class="modal-body">
                    <label class="form-label">Quantity</label>
                    <input type="text" name="Quantity_P1" class="form-control text-dark" style="background-color : #DDDDDD" id="Quantity_P_id1"/>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                    <button type="submit" name="saveuser" class="btn btn-primary task-action-btn" id="task-save-btn1">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if (session('openLogin'))
<script>
    $('#modal-task2').modal('show');
</script>
@endif