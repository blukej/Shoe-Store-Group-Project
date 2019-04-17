<form action="<?= APP_BASE_URL ?>/update-shoe" method="post">

<input id='shoe_id' type='hidden' name='shoe_id' value="<?=$shoe_id  = $_GET['update'];?>">

    <label for='Name'>Shoe Name</label>
    <input id='Name' type='text' name='name' placeholder="<?php echo $locals['name']?>"/>

    <label for='Brand'>Brand</label>
    <input id='Brand' type='text' name='brand' placeholder="<?php echo $locals['brand']?>"/>

    <label for='Size'>Size</label>
    <input id='Size' type='decimal' name='size' placeholder="<?php echo $locals['size']?>"/>

    <label for='Price'>Price</label>
    <input id='Price' type='decimal' name='price' placeholder="<?php echo $locals['price']?>"/>

    <input type='submit' value='Submit'>
</form>