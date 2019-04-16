<form action="<?= APP_BASE_URL ?>/add-shoe" method="post">
    <label for='Name'>Shoe Name</label>
    <input id='Name' type='text' name='name'>

    <label for='Brand'>Brand</label>
    <input id='Brand' type='text' name='brand'>

    <label for='Size'>Size</label>
    <input id='Size' type='decimal' name='size'>

    <label for='Price'>Price</label>
    <input id='Price' type='decimal' name='price'>

    <input type='submit' value='Submit'>
</form>