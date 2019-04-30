<form action="<?= APP_BASE_URL ?>/update-shoe" method="post">

<input id='shoe_id' type='hidden' name='shoe_id' value="<?=$_GET['update'];?>">

    <div class="form-group col-sm-10">
    <label for='Brand'>Brand</label>
    <input id='Brand' class="form-control" type='text' name='brand' value="<?=$locals['brand']?>"/>
    </div>

    <div class="form-group col-sm-10">
    <label for='Name'>Shoe Name</label>
    <input id='Name' class="form-control" type='text' name='name' value="<?=$locals['name']?>"/>
    </div>

    <div class="form-group col-sm-10">
    <label for='Size'>Size</label>
    <input id='Size' class="form-control" type='number' name='size' step='0.1' value="<?=$locals['size']?>"/>
    </div>

    <div class="form-group col-sm-10">
    <label for='Price'>Price</label>
    <input id='Price' class="form-control" type='number' name='price' step='0.01' value="<?=$locals['price']?>"/>
    </div>

    <div class="form-group col-sm-10">
    <label for='Image Url'>Image Url</label>
    <input id='Url' class="form-control" type='text' name='url' step='0.01' value="<?=$locals['url']?>"/>
    </div>

    <div class="col-sm-10">
    <input type='submit' class="btn btn-primary" value='Submit'>
    </div>
</form>