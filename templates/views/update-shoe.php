<form action="<?= APP_BASE_URL ?>/update-shoe" method="post">

<input id='shoe_id' type='hidden' name='shoe_id' value="<?=$_GET['update'];?>">

    <label for='Brand'>Brand</label>
    <input id='Brand' type='text' name='brand' value="<?=$locals['brand']?>"/>

    <label for='Name'>Shoe Name</label>
    <input id='Name' type='text' name='name' value="<?=$locals['name']?>"/>

    <label for='Size'>Size</label>
    <input id='Size' type='number' name='size' step='0.1' value="<?=$locals['size']?>"/>

    <label for='Price'>Price</label>
    <input id='Price' type='number' name='price' step='0.01' value="<?=$locals['price']?>"/>

    <input type='submit' value='Submit'>
</form>