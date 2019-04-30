<form action="<?= APP_BASE_URL ?>/add-shoe" method="post">
    
    <div class="form-group col-sm-10">
    <label for='Brand'>Brand</label>
    <input id='Brand' class="form-control"  type='text' name='brand'>
    </div>

    <div class="form-group col-sm-10">
    <label for='Name'>Shoe Name</label>
    <input id='Name' class="form-control"  type='text' name='name'>
    </div>

    <div class="form-group col-sm-10">
    <label for='Size'>Size</label>
    <input id='Size' class="form-control"  type='number' name='size' step='0.1'/>
    </div>

    <div class="form-group col-sm-10">
    <label for='Price'>Price</label>
    <input id='Price' class="form-control"  type='number' name='price' step='0.01'/>
    </div>

    <div class="form-group col-sm-10">
    <label for='Image Url'>Image Url</label>
    <input id='Url' class="form-control"  type='text' name='url'>
    </div>

    <div class="col-sm-10">
    <input type='submit' class="btn btn-primary" value='Submit'>
    </div>
</form>